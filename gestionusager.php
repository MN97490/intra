<?php
session_start( );


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire utilisateur</title>
    <link rel="stylesheet"  href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
</head>
<body>
<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
    echo "La connexion est réussie";
 } else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
    session_unset();
 }

 $servername="localhost";
    $usernameDB="root";
    $passwordDB="root";
    $dbname="intra";

    //creez la connection
    $conn = new mysqli($servername,$usernameDB,$passwordDB,$dbname);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);


}

$conn->query("SET NAMES utf8");

$sql = "SELECT user FROM usager WHERE administrateur = 1";
$result = mysqli_query($conn, $sql);

$nom_utilisateur = $_SESSION['user']; 


$sql = "SELECT administrateur FROM usager WHERE user = '$nom_utilisateur'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $statut_administrateur = (int) $row['administrateur'];

  

   
    if ($statut_administrateur === 1) {
       
    } else {
       
        echo "Vous n'êtes pas administrateur. Vous ne pouvez pas accéder à cette page.";
    }
} else {

    echo "Erreur : " . mysqli_error($conn);
  
}

?>
    
</body>
</html>