<?php
session_start();
unset($_SESSION['verifDirectionU']);

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
<body class="bodyGestion">
<div>  
<nav id='menu'>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='http://localhost/intra/index.php'>Accueil</a></li>
    <li><a href='http://localhost/intra/creation.php'>Création</a></li>
    <li><a href='http://localhost/intra/stat.php'>Statistiques</a></li>
    <li><a href='http://localhost/intra/vote.php'>Vote</a></li>
    <li><a  href='http://localhost/intra/recap.php'>Récapitulatif</a>
    </li>
    <li><a href='http://localhost/intra/gestionusager.php'>Gestion Usager</a></li>
    <li><a class="decoContent" href='http://localhost/intra/deco.php'> <?php echo$_SESSION['user']?>  <img src="img\se-deconnecter.png"  class="decoIcon"alt="Deco"> </a></li>
    </div>  
 <div>
<form method="post" action="creationUsager.php">
                       
                           
                       <button type="submit" name="ajoutBtn" class="ajoutBtn">Ajout Utilisateur</button>
                   </form>
                   </div>  
<?php

if ($_SESSION["connexion"] == true) {
    echo "La connexion est réussie";
} else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
    session_unset();
}

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "root";
$dbname = "intra";
$table = "usager";
$_SESSION["modifidU"]="";
$_SESSION["modiftableU"]="";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET NAMES utf8");

$nom_utilisateur = $_SESSION['user'];
$resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);

$sql = "SELECT id,user,password,administrateur FROM usager ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
         
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom Utilisateur</th>
                    <th scope="col">Mot de Passe</th>
                    <th scope="col">Administrateur</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["user"] ?></td>
                    <td><?php echo $row["password"] ?></td>
                    <td><?php echo $row["administrateur"] ?></td>
                    <td >
                        <form method="post" action="">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                            <input type="hidden" name="table" value="<?php echo $table ?>">
                            <button type="submit" name="deleteButton" class="deleteButton">Supprimer</button>
                        </form>
                       
                        <form method="post" action="modif.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ; $_SESSION["modifidU"]= $row["id"]; ?>">
                            <input type="hidden" name="table" value="<?php echo $table ;$_SESSION["modiftableU"]=$table; ?>">
                            <input type="hidden" name="verif" value="<?php $_SESSION["verifDirectionU"]=true; ?>">
                            <button type="submit" name="modifBtn" class="modifBtn">Modifier</button>
                        </form>
                   
                    
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <?php
        
        if (isset($_POST["deleteButton"])) {
            $id = $_POST["id"];
            $table = $_POST["table"];
            deleteRecord($conn, $id, $table);
            header('Location: gestionusager.php');
            
        }
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
