<?php
session_start();
$_SESSION['verifDirectionU'] = false;
$_SESSION['verifDirectionE'] = false;
$_SESSION["verifDirectionV"] = false;
include 'fonction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
    <title>Choixvote</title>
</head>
<body class="bodyStat">
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
if ($_SESSION["connexion"] == true) {
    $nom_utilisateur = $_SESSION['user'];
    $resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);
} else {
    echo "La connexion n'est pas établie";
    header('Location: connect.php');
    session_destroy();
}
include 'log.php';
$_SESSION["modifidV"] = "";
$_SESSION["verifDirectionVEl"]=false;
$_SESSION["verifDirectionVEN"]=false;
$table = "evenement";
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES utf8");
$sql = "SELECT id, nom, date, departement, lieu, heure FROM evenement";
$result = $conn->query($sql);

?>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    
        ?>
          
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom </th>
                    <th scope="col">date</th>
                    <th scope="col">departement</th>
                    <th scope="col">lieu</th>
                    <th scope="col">heure</th>
                    <th scope="col">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td><?php echo $row["departement"] ?></td>
                    <td><?php echo $row["lieu"] ?></td>
                    <td><?php echo $row["heure"] ?></td>
                    
                    <td >
                    
                        <form method="get" action="vote.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ; $_SESSION["modifidV"]= $row["id"]; ?>">
                            <input type="hidden" name="verif" value="<?php $_SESSION["verifDirectionVEl"]=true; ?>">
                            <button type="submit" name="modifBtn" class="modifBtn">Vote Eleve</button>
                        </form>
                        <form method="get" action="voteEntreprise.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ; $_SESSION["modifidV"]= $row["id"]; ?>">
                            <input type="hidden" name="verif" value="<?php $_SESSION["verifDirectionVEN"]=true; ?>">
                            <button type="submit" name="modifBtn" class="modifBtn">Vote entreprise</button>
                        </form>
                    
                    </td>
                    
                </tr>
            </tbody>
        </table>
        <?php
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
