<?php
session_start();
$_SESSION['verifDirectionU']=false;
$_SESSION['verifDirectionE']=false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet"  href="css/style.css">

    <title>index</title>
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
</head>
<body class="bodindex">
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


?>
    <h1 class="bienvenue">bienvenue sur la page index</h1>
<button class="BtnIndex"><a href="creation.php" class="LienIndex">creation.php</a></button>
<button class="BtnIndex"><a href="stat.php" class="LienIndex">stat.php</a></button>
<button class="BtnIndex"><a href="vote.php" class="LienIndex">vote.php</a></button>


<div class="footer">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>


</body>
</html>