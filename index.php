<?php
session_start();
$_SESSION['verifDirectionU']=false;
$_SESSION['verifDirectionE']=false;
$_SESSION["modifidV"]=null;
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
    <li><a href='index.php'>Accueil</a></li>
    <li><a href='creation.php'>Création</a></li>
    <li><a href='stat.php'>Statistiques</a></li>
    <li><a href='choixvote.php'>Vote</a></li>
    <li><a  href='recap.php'>Récapitulatif</a>
    </li>
    <li><a href='gestionusager.php'>Gestion Usager</a></li>
    <li><a class="decoContent" href='deco.php'> <?php echo$_SESSION['user']?>  <img src="img\se-deconnecter.png"  class="decoIcon"alt="Deco"> </a></li>
   
  </ul>
</nav>
<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
  
 } else {
    echo "La connexion n'est pas établie";
    header('Location: connect.php');
    session_destroy();
    session_unset();
 }
 include 'log.php';

?>
   

<script>
   
    window.addEventListener('load', function () {
        var textElement = document.querySelector('.fadeIn');
        textElement.classList.add('appear');
    });
</script>
<div class="fadeIn">Bienvenue sur la gestion d'evenement des stages</div>
<div class="footer">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>


</body>
</html>