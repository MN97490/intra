<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css/style.css">
</head>
<body class="bodyStat">

<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
    echo "La connexion est réussie";
 } else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
 }


?>
    <button  class=" btnIndexStat"><a href="index.php" class="LienIndexStat">index</a></button>
    <button class="btnDeconnexion " id="btnDeconnexion" name="btnDeconnexionStat"> <a href="deco.php" class="LienDecoStat">Deconnexion</a></button>

    <?php 
        
    ?>
</body>
</html>