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
    <link rel="stylesheet"  href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
</head>
<body class="bodyStat">


<?php 
if ($_SESSION["connexion"] == true) {
   
    $nom_utilisateur = $_SESSION['user'];
$resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);
} else {
    echo "La connexion n'est pas établie";
    header('Location: connect.php');
    session_destroy();
    session_unset();
}

include 'log.php';



$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET NAMES utf8");

function trojan($data){

    $data = trim($data); 

    $data = addslashes($data); 

    $data = htmlspecialchars($data); 

    return $data;

}
 if($_SESSION["verifDirectionU"]==true){
    





if ($_SESSION["modiftableU"]=="usager"){
 


$usernameUser=$passwordUser="" ;
$statutUser=0;
$erreur =false;
$usernameUserError = $passwordUserError = $statutUserError = "";
if ($_SERVER['REQUEST_METHOD'] == "GET" ) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $_SESSION["modifidU"] = $_GET['id'];
      
    } else {
       
        $_SESSION["modifidU"] = $_GET['ide']; 
     
    }


    if (empty($_GET['usernameUser']) ) {
        
        $usernameUserError = "L'idenfiant ne peut pas être vide";
        $erreur = true;
    } else {
        $usernameUser = trojan($_GET['usernameUser']);
        $usernameUser=trojan( $usernameUser);
    }
    if (empty($_GET['passwordUser'])) {
        $passwordUserError = "Le mot de passe ne peut pas être vide";
        $erreur = true;
    } else {
       
        $passwordUser = $_GET['passwordUser'];
        $passwordUser=trojan($passwordUser);
        $passwordUser=sha1($passwordUser);
       
    }
    if (isset($_GET['statutUser'])) {
       
        $statutUser = 1;
    } else {
      
        $statutUser = 0;
    }
    
       
}

   
    if (!$erreur) {
        $ide = $_SESSION["modifidU"];
        $sql ="UPDATE usager SET user='$usernameUser' ,  password='$passwordUser', administrateur='$statutUser' WHERE id='$ide' ";

        header('Location: gestionusager.php');
        if (mysqli_query($conn, $sql)) {
            echo "Modification réussi";
           
          
        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}


 if($_SERVER['REQUEST_METHOD'] != "GET" || $erreur==true){
?>
<form class="formcreation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="get">
    <label style="color:black;">Identifiant utilisateur :</label>
    <input type="text" id="usernameUser" name="usernameUser" value = "<?php echo $usernameUser;?>"><br>
    <p style="color:red;"><?php echo $usernameUserError;?></p>
    <label style="color:black;">Mot de passe utilisateur :</label>
    <input type="text" id="passwordUser" name="passwordUser" value = "<?php echo $passwordUser;?>"><br>
    <p style="color:red;"><?php echo $passwordUserError;?></p>
    <label style="color:black;">Utilisateur Administrateur</label>
    <input type="checkbox" id="statutUser" name="statutUser" value="<?php echo $statutUser ; ?>"><br>
    <input type="hidden" name="ide" value="<?php  $ide=$_SESSION["modifidU"]; echo $ide;  ?>">
   
    <input type="submit" name="modifBTNU" value="Modifier">
    
</form>
<?php

}
} 

  else  if($_SESSION["verifDirectionE"]==true){
    
 




        if ($_SESSION["modiftableE"]=="evenement"){
          
            $id=$_SESSION["modifidE"];
           
           $nomevent=$localevent=$heurevent=$datevent=$departevent ="" ;
           $heureuxEleve=$moyenHeureuxEleve=$pasHeureuxEleve=$heureuxEntreprise=$moyenHeureuxEntreprise=$pasHeureuxEntreprise="";
            
        $erreur =false;
        $nomEventError = $localEventError = $heureEventError = $dateEventError =$departEventError =$heureuxEleveErreur=$moyenHeureuxEleveErreur=$pasHeureuxEleveErreur=$heureuxEntrepriseErreur=$moyenHeureuxEntrepriseErreur=$pasHeureuxEntrepriseErreur= "";
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $_SESSION["modifidE"] = $_GET['id'];
              
            } else {
               
                $_SESSION["modifidE"] = $_GET['ideV']; 
             
            }
        
          
            if (empty($_GET['nomevent'])) {
                 $nomEventError = "Le nom de l`evenement ne peut pas être vide";
                $erreur = true;
            } else {
                $nomevent = trojan($_GET['nomevent']);
                $nomevent=trojan($nomevent);
              
            }
            if (empty($_GET['localevent'])) {
                $localEventError= "Le local ne peut pas être vide";
                $erreur = true;
            } else {
               
                $localevent = trojan($_GET['localevent']);
              
                $localevent=trojan($localevent);
               
            }
            if (empty($_GET['heurevent'])) {
                $heureEventError="L'heure de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $heurevent = trojan($_GET['heurevent']);
                $heurevent=trojan($heurevent);

            }
            if (empty($_GET['datevent'])) {
                $dateEventError="La date de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $datevent = trojan($_GET['datevent']);
                $datevent=trojan($datevent);


            }
            if (empty($_GET['departevent'])) {
                $departEventError="Le nom du departement  de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $departevent = trojan($_GET['departevent']);
                $departevent=trojan($departevent);

            }
            if (empty($_GET['heureuxEleve'])) {
                $heureuxEleveErreur="La nombre d'eleve heureux de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $heureuxEleve = trojan($_GET['heureuxEleve']);
                $heureuxEleve=trojan($heureuxEleve);


            }
            if (empty($_GET['moyenHeureuxEleve'])) {
                $moyenHeureuxEleveErreur="La nombre d'eleve neutre de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $moyenHeureuxEleve = trojan($_GET['moyenHeureuxEleve']);
                $moyenHeureuxEleve=trojan($moyenHeureuxEleve);

            }
           
            if (empty($_GET['pasHeureuxEleve'])) {
                $pasHeureuxEleveErreur="La nombre d'eleve mécontent de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $pasHeureuxEleve = trojan($_GET['pasHeureuxEleve']);
                $pasHeureuxEleve=trojan($pasHeureuxEleve);

            }
            if (empty($_GET['heureuxEntreprise'])) {
                $heureuxEntrepriseErreur="La nombre d'entreprise heureuse de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $heureuxEntreprise = trojan($_GET['heureuxEntreprise']);
                $heureuxEntreprise=trojan($heureuxEntreprise);

            }
            if (empty($_GET['moyenHeureuxEntreprise'])) {
                $moyenHeureuxEntrepriseErreur="La nombre d'entreprise neutre de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $moyenHeureuxEntreprise = trojan($_GET['moyenHeureuxEntreprise']);
                $moyenHeureuxEntreprise=trojan($moyenHeureuxEntreprise);

            }
            if (empty($_GET['pasHeureuxEntreprise'])) {
                $moyenHeureuxEntrepriseErreur="La nombre d'entreprise mécontent de l'evenement ne peut pas être vide ";
                $erreur = true;
            } else {

                $pasHeureuxEntreprise = trojan($_GET['pasHeureuxEntreprise']);
                $pasHeureuxEntreprise=trojan($pasHeureuxEntreprise);

        
        
        
        
        
               
           
        
           
            if (!$erreur) {
                $ideV = $_SESSION["modifidE"];
                $sql ="UPDATE evenement SET nom='$nomevent' ,  lieu='$localevent', Heure='$heurevent', date='$datevent', departement='$departevent' ,heureuxEleve='$heureuxEleve',moyenHeureuxEleve='$moyenHeureuxEleve',pasHeureuxEleve='$pasHeureuxEleve',heureuxEntreprise='$heureuxEntreprise',moyenHeureuxEntreprise='$moyenHeureuxEntreprise',pasHeureuxEntreprise='$pasHeureuxEntreprise'  WHERE id='$ideV' ";
        
               header('Location: stat.php');
                if (mysqli_query($conn, $sql)) {
                    echo "Modification réussi";
                   
                  
                } else {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        
        
         if($_SERVER['REQUEST_METHOD'] != "GET" || $erreur==true){
            ?>
            <form class="formcreation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="get">
            <input type="hidden" name="ideV" value="<?php $ideV=$_SESSION["modifidE"]; echo $ideV;  ?>">
                <label style="color:black;">nom de l'evenement:</label>
                <input type="text" id="nomevent" name="nomevent" value = "<?php echo $nomevent;?>"><br>
                <p style="color:red;"><?php echo $nomEventError;?></p>
                <label style="color:black;"> local de l'evenement:</label>
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
                <label style="color:black;">Nombre d'eleve heureux de l'evenement:</label>
                <input type="text" id="heureuxEleve" name="heureuxEleve" value = "<?php echo $heureuxEleve;?>"><br>
                <p style="color:red;"><?php echo $heureuxEleveErreur;?></p>
                <label style="color:black;">Nombre d'eleve neutre de l'evenement:</label>
                <input type="text" id="moyenHeureuxEleve" name="moyenHeureuxEleve" value = "<?php echo $moyenHeureuxEleve;?>"><br>
                <p style="color:red;"><?php echo $moyenHeureuxEleveErreur;?></p>
                <label style="color:black;">Nombre d'eleve mécontent de l'evenement:</label>
                <input type="text" id="pasHeureuxEleve" name="pasHeureuxEleve" value = "<?php echo $pasHeureuxEleve;?>"><br>
                <p style="color:red;"><?php echo $pasHeureuxEleveErreur;?></p>
                <label style="color:black;">Nombre d'entreprise heureux de l'evenement:</label>
                <input type="text" id="heureuxEntreprise" name="heureuxEntreprise" value = "<?php echo $heureuxEntreprise;?>"><br>
                <p style="color:red;"><?php echo $heureuxEntrepriseErreur;?></p>
                <label style="color:black;">Nombre d'entreprise neutre de l'evenement:</label>
                <input type="text" id="moyenHeureuxEntreprise" name="moyenHeureuxEntreprise" value = "<?php echo $moyenHeureuxEntreprise;?>"><br>
                <p style="color:red;"><?php echo $moyenHeureuxEntrepriseErreur;?></p>
                <label style="color:black;">Nombre d'entreprise mécontente de l'evenement:</label>
                <input type="text" id="pasHeureuxEntreprise" name="pasHeureuxEntreprise" value = "<?php echo $pasHeureuxEntreprise;?>"><br>
                <p style="color:red;"><?php echo $pasHeureuxEntrepriseErreur;?></p>
                
                <input type="submit" value="Modification">
                
            </form>
        <?php
        
        }
        } 



}

else {
    header('Location: index.php');

}}
?>


</body>
</html>