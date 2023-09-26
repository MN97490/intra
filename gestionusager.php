<?php
session_start( );

include 'fonction.php';
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



$nom_utilisateur = $_SESSION['user'];
$resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);

?>
    
</body>
</html>