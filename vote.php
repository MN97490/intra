<?php
session_start();
$_SESSION['verifDirectionU'] = false;
$_SESSION['verifDirectionE'] = false;
$_SESSION["modifidV"] = $_GET["id"];
include 'fonction.php';
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
    <title>Vote eleve</title>
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
   
</head>
<body class="bodyVote" >

<?php
// Set session variables
if ($_SESSION["connexion"] == true) {
    $nom_utilisateur = $_SESSION['user'];
    $resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);
} else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
   
}

include 'log.php';





    



$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET NAMES utf8");

    
$id=$_SESSION["modifidV"];
if(isset($_GET['voteButton']) && $_GET['voteButton'] == '( ° ͜ʖ °)')  {
    
    $sql = "UPDATE evenement SET heureuxEleve = heureuxEleve + 1 WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}
if (isset($_GET['voteButton']) && $_GET['voteButton'] == '¯\_(ツ)_/¯ ')  {
    
    $id = $_SESSION["modifidV"];
    $sql = "UPDATE evenement SET moyenHeureuxEleve = moyenHeureuxEleve + 1 WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
       
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}

if (isset($_GET['voteButton']) && $_GET['voteButton'] == '( ͡° ʖ̯ ͡°) ')  {
    
    $id = $_SESSION["modifidV"];
    $sql = "UPDATE evenement SET pasHeureuxEleve = pasHeureuxEleve + 1 WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
     
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}

?>
<div class="container">
    <div class="row ">
        <div class="col centrage ">
            <form class="" action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="submit" name="voteButton" class=" good" value="( ° ͜ʖ °)">
            </form>
        </div>
        <div class="col centrage ">
            <form  class="" action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="submit" name="voteButton" class=" mid" value="¯\_(ツ)_/¯ ">
            </form>
        </div>
        <div class="col centrage ">
            <form class="" action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="submit" name="voteButton" class=" bad" value="( ͡° ʖ̯ ͡°) ">
            </form>
        </div>
    </div>
</div>




<div class="footer">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>

</body>
</html>
