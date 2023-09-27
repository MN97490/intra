<?php
session_start();

include 'fonction.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>

<?php 
if ($_SESSION["connexion"] == true) {
    echo "La connexion est réussie";
} else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
    session_unset();
}

if($_SESSION["verifDirectionU"]==true){
    echo "test";

}else {
    header('Location: http://localhost/intra/index.php');

}

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "root";
$dbname = "intra";



$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET NAMES utf8");
$nom_utilisateur = $_SESSION['user'];
$resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);


if ($_SESSION["modiftableU"]=="usager"){
   
   $id=$_SESSION["modifidU"];
$usernameUser=$passwordUser="" ;
$statutUser=false;
$erreur =false;
$usernameUserError = $passwordUserError = $statutUserError = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (empty($_GET['usernameUser'])) {
        $usernameUserError = "L'idenfiant ne peut pas être vide";
        $erreur = true;
    } else {
        $usernameUser = $_GET['usernameUser'];
    }
    if (empty($_GET['passwordUser'])) {
        $passwordUserError = "Le mot de passe ne peut pas être vide";
        $erreur = true;
    } else {
       
        $passwordUser = $_GET['passwordUser'];
        $passwordUser=sha1($passwordUser);
        $statutUser= $_GET['statutUser'];
    }

   

   
    if (!$erreur) {
        $sql ="UPDATE usager SET user='$usernameUser' ,  password='$passwordUser', administrateur='$statutUser' WHERE id=$id ";

        header('Location: http://localhost/intra/gestionusager.php');
        if (mysqli_query($conn, $sql)) {
            echo "Modification réussi";
           
          
        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function trojan($data){
    return $data; 
 }
 if($_SERVER['REQUEST_METHOD'] != "GET" || $erreur==true){
?>
<form class="formcreation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="get">
    <label>Identifiant utilisateur :</label>
    <input type="text" id="usernameUser" name="usernameUser" value = "<?php echo $usernameUser;?>"><br>
    <p style="color:red;"><?php echo $usernameUserError;?></p>
    <label>Mot de passe utilisateur :</label>
    <input type="text" id="passwordUser" name="passwordUser" value = "<?php echo $passwordUser;?>"><br>
    <p style="color:red;"><?php echo $passwordUserError;?></p>
    <label>Utilisateur Administrateur</label>
    <input type="checkbox" id="statutUser" name="statutUser" value="<?php echo ($statutUser) ? '0' : '1'; ?>"><br>
 
   
    <input type="submit" value="Creation">
    
</form>
<?php

}
} 
?>
<body>
    
</body>
</html>