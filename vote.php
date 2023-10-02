<?php
session_start();
unset($_SESSION['verifDirectionU']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet"  href="css/style.css">
    <title>vote eleve</title>
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
    
</head>
    <body class="bodyvote">
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
<div name ="divvote">
        
        <form action="elevegood.php?id=<?php echo $_GET['id']; ?>" method="get">
        <button class="good" type="submit">( ° ͜ʖ °)</button>
        </form>
        <form action="elevemid.php?id=<?php echo $_GET['id']; ?>" method="get">
        <button class="mid" type="submit">¯\_(ツ)_/¯</button>
        </form>
        <form action="elevebad.php?id=<?php echo $_GET['id']; ?>" method="get">
        <button class="bad" type="submit">( ͡° ʖ̯ ͡°)</button>
</form>
    
 </div>

    <div class="footer">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>

</body>
</html>  