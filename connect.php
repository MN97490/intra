<?php
session_start( );

unset($_SESSION['verifDirectionU']);
unset($_SESSION['verifDirectionE']);
unset($_SESSION["connexion"]);


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
function trojan($data){

    $data = trim($data); 

    $data = addslashes($data); 

    $data = htmlspecialchars($data); 

    return $data;

}
 include 'log.php';

 //creez la connection
 $conn = new mysqli($servername,$usernameDB,$passwordDB,$dbname);
 //check la co
 if ($conn-> connect_error){
     die ("Connection failed:". $conn->connect_error);
 }
 $UsernameError="";
 $PasswordError="";
 $erreur=false;
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    if (empty($_POST['username'])) {
        $UsernameError = "L'identifiant ne peut pas être vide";
        $erreur = true;
    } else {
       
        $user = $_POST['username'];
        $user=trojan($user);
    }
    if (empty($_POST['password'])) {
        $PasswordError = "Le mot de passe  ne peut pas être vide";
        $erreur = true;
    } else {
        $password= $_POST['password'];
        $password=trojan ($password);
        $password = sha1($password,false);
    }





if (!$erreur) {
    $sql = "SELECT * FROM usager where user='$user' and password='$password' ";
    $result = $conn->query($sql);
if ($result->num_rows >0){
    $row = $result->fetch_assoc();
    echo "<h1>Connecté</h1>";
    $_SESSION ["connexion"] = true;
    $_SESSION['user'] = $user; 
    $_SESSION["verifDirectionU"]=false;
    $_SESSION["verifDirectionE"]=false;
    header('Location: index.php');
}
else {
  
    $UsernameError="Nom d'usager ou mot de passe invalide";
    $PasswordError="Nom d'usager ou mot de passe invalide";
} }
$conn->close();

}


?>

   
    <div class="centering">
            <div class="formulaireCo" >
            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post">
                <label for="username">Utilisateur:</label>
                <input type="text" name="username" value = "" placeholder=" Utilisateur" ><br>
                <p style="color:red;"><?php echo $UsernameError;?></p>
                <label for="password">Mot de Passe:</label>
                 <input type="password" name="password" value = "" placeholder="Mot de Passe"><br>
                 <p style="color:red;"><?php echo $PasswordError;?></p>

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