<?php
session_start( );

unset($_SESSION['verifDirectionU']);
unset($_SESSION['verifDirectionE']);
unset($_SESSION["connexion"]);
function trojan($data){

    $data = trim($data); 

    $data = addslashes($data); 

    $data = htmlspecialchars($data); 

    return $data;

}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet"  href="css/style.css">
    <title>Connexion</title>
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
    
</head>

<body class="bodyConnect"  >

<video autoplay muted loop id="background-video">
  <source src="img\cegeploop.mp4" type="video/mp4">
 
</video>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['username'];
    $password= $_POST['password'];

   $user=trojan($user);
   $password=trojan ($password);

    $password = sha1($password,false);
    echo $password;
    $_SESSION['user'] = $user; 
    $_SESSION["verifDirectionU"]=false;
    $_SESSION["verifDirectionE"]=false;
    // verifier si l'usager est dans la bd , activer la session
 include 'log.php';

    //creez la connection
    $conn = new mysqli($servername,$usernameDB,$passwordDB,$dbname);
    //check la co
    if ($conn-> connect_error){
        die ("Connection failed:". $conn->connect_error);
    }
$sql = "SELECT * FROM usager where user='$user' and password='$password' ";

$result = $conn->query($sql);

if ($result->num_rows >0){
    $row = $result->fetch_assoc();
    echo "<h1>Connecté</h1>";
    $_SESSION ["connexion"] = true;
    header('Location: index.php');
}
else {
    echo "<h2> Nom d'usager ou mot de passe invalide </h2>";
    header('Location: connect.php');
}
$conn->close();

}


?>

   
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
    <div class="footerConnect">
    <div class="footerContent">
        <img src="img\logoCegepNoBg.png" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>

   

    
</body>
</html>