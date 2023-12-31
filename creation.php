<?php
session_start();
$_SESSION['verifDirectionU']=false;
$_SESSION['verifDirectionE']=false;
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
    <title>creation</title>
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
    
    
</head>
<body class="bodycreation">
  
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


$nomevent=$localevent=$heurevent=$datevent=$departevent ="" ;
$erreur =false;
$nomEventError = $localEventError = $heureEventError = $dateEventError =$departEventError = "";
// Set session variables
if ($_SESSION["connexion"] == true) {
  

 
 } else {
    echo "La connexion n'est pas établie";
    header('Location: connect.php');
    session_destroy();

 }
 include 'log.php';
 $conn = mysqli_connect($servername,$usernameDB,$passwordDB,$dbname);

 $sql = "SELECT user FROM usager WHERE administrateur = 1";
$result = mysqli_query($conn, $sql);


$nom_utilisateur = $_SESSION['user'];
$resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);


 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['nomevent'])) {
        $nomEventError = "Le nom ne peut pas être vide";
        $erreur = true;
    } else {
        $nomevent = trojan($_POST['nomevent']);
        $nomevent=trojan($nomevent);
    }
    if (empty($_POST['localevent'])) {
        $localEventError = "Le local ne peut pas être vide";
        $erreur = true;
    } else {
        $localevent = trojan($_POST['localevent']);
        $localevent=trojan($localevent);

    }
    if (empty($_POST['heurevent'])) {
        $heureEventError = "L'heure ne peut pas être vide";
        $erreur = true;
    } else {
        $heurevent = trojan($_POST['heurevent']);
        $heurevent=trojan($heurevent);

    }
    if (empty($_POST['datevent'])) {
        $dateEventError = "La date ne peut pas être vide";
        $erreur = true;
    } else {
        $dateevent = trojan($_POST['datevent']);
        $dateevent=trojan($dateevent);
    }
    if (empty($_POST['departevent'])) {
        $departEventError = "Le département ne peut pas être vide";
        $erreur = true;
    } else {
        $departevent = trojan($_POST['departevent']);
        $departevent=trojan($departevent);
    }

   
    if (!$erreur) {
        $sql = "INSERT INTO evenement (nom, date, departement, lieu, heure,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise)
                VALUES ('$nomevent', '$dateevent', '$departevent', '$localevent', '$heurevent','0','0','0','0','0','0')";
        if (mysqli_query($conn, $sql)) {
            echo "Enregistrement réussi";
            header('Location: stat.php');
          
        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

function trojan($data){

    $data = trim($data); 

    $data = addslashes($data); 

    $data = htmlspecialchars($data); 

    return $data;

}
 if($_SERVER['REQUEST_METHOD'] != "POST" || $erreur==true){
?>
<form class="formcreation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post">
    <label style="color:black;">nom de l'evenement:</label>
    <input type="text" id="nomevent" name="nomevent" value = "<?php echo $nomevent;?>"><br>
    <p style="color:red;"><?php echo $nomEventError;?></p>
    <label style="color:black;">local de l'evenement:</label>
    <input type="text" id="localevent" name="localevent" value = "<?php echo $localevent;?>"><br>
    <p style="color:red;"><?php echo $localEventError;?></p>
    <label style="color:black;">heure de l'evenement:</label>
    <input type="time" id="heurevent" name="heurevent" value = "<?php echo $heurevent;?>"><br>
    <p style="color:red;"><?php echo $heureEventError;?></p>
    <label style="color:black;">date de l'evenement:</label>
    <input type="date" id="datevent" name="datevent" value = "<?php echo $datevent;?>"><br>
    <p style="color:red;"><?php echo $dateEventError;?></p>
    <label style="color:black;">departement de l'evenement:</label>
    <input type="text" id="departevent" name="departevent" value = "<?php echo $departevent;?>"><br>
    <p style="color:red;"><?php echo $departEventError;?></p>
    <input type="submit" value="Creation">
 
</form>
<?php

}
?>


<div class="footer">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>

</body>
</html>