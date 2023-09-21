<?php
session_start( );





?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet"  href="css/style.css">
    <title>Connexion</title>
    
</head>

<body class="bodyConnect">

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['username'];
    $password= $_POST['password'];

    $password = sha1($password,false);
    echo $password;

    // verifier si l'usager est dans la bd , activer la session
    $servername="localhost";
    $usernameDB="root";
    $passwordDB="root";
    $dbname="intra";

    //creez la connection
    $conn = new mysqli($servername,$usernameDB,$passwordDB,$dbname);
    //check la co
    if ($conn-> connect_error){
        die ("Connection failed:". $conn->connect_error);
    }
$sql = "SELECT * FROM usager where user='$user' and password='$password' ";
echo $sql;
$result = $conn->query($sql);

if ($result->num_rows >0){
    $row = $result->fetch_assoc();
    echo "<h1>Connecté</h1>";
    $_SESSION ["connexion"] = true;
    header('Location: http://localhost/intra/index.php');
}
else {
    echo "<h2> Nom d'usager ou mot de passe invalide </h2>";
    header('Location: http://localhost/intra/connect.php');
}
$conn->close();

}


?>

    <img src="img/logocegep.jpg" class="logoCegepConnect" alt="logo du cegep">
    <div class="centering">
            <div class="formulaireCo" >
            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post">
                username: <input type="text" name="username" value = "" placeholder="username" ><br>
                <p style="color:red;"></p>
                password: <input type="password" name="password" value = "" placeholder="mot de passe"><br>
                <p style="color:red;"></p>

                <input type="submit" value="Connexion" >
                </form> 
            </div>

    </div>
    <div class="footer">
        <p>© 2023 Cegep de Trois-Rivières. Tous droits réservés.</p>
    </div>
   

    
</body>
</html>