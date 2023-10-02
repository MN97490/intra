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
<nav id='menu'>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='http://localhost/intra/index.php'>Accueil</a></li>
    <li><a href='http://localhost/intra/creation.php'>Création</a></li>
    <li><a href='http://localhost/intra/stat.php'>Statistiques</a></li>
    <li><a href='http://localhost/intra/choixvote.php'>Vote</a></li>
    <li><a  href='http://localhost/intra/recap.php'>Récapitulatif</a>
    </li>
    <li><a href='http://localhost/intra/gestionusager.php'>Gestion Usager</a></li>
    <li><a class="decoContent" href='http://localhost/intra/deco.php'> <?php echo$_SESSION['user']?>  <img src="img\se-deconnecter.png"  class="decoIcon"alt="Deco"> </a></li>
   
  </ul>
</nav>
<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
  
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