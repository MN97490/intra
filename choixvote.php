<?php
session_start();
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
    <link rel="stylesheet"  href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php
if ($_SESSION["connexion"] == true) {
    $nom_utilisateur = $_SESSION['user'];
    $resultat = verifierStatutAdministrateur($conn, $nom_utilisateur);

 
} else {
   echo "La connexion n'est pas établie";
   header('Location: http://localhost/intra/connect.php');
   session_destroy();

}
$servername="localhost";
$usernameDB="root";
$passwordDB="root";
$dbname="intra";
$_SESSION["idV"]=0;
$id =  $_SESSION["idV"];
$conn = mysqli_connect($servername,$usernameDB,$passwordDB,$dbname);

$sql = "SELECT user FROM usager WHERE administrateur = 1";
$result = mysqli_query($conn, $sql);

$result = $conn->query('SET NAMES utf8');
$sql = "SELECT id, nom, date, departement FROM evenement";
$result =$conn->query($sql);
if($result ->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?><div class="container">
            <div class="row bg-dark.bg-gradient">
                <div class="col-3">
                    <?php echo "id: ".$row["id"];?>
                </div>
                <div class="col-3">
                    <?php echo "nom: ".$row["nom"];?>
                </div>
                <div class="col-3">
                    <?php echo "date: ".$row["date"];?>
                </div>
                <div class="col-3">
                    <?php echo "departement: ".$row["departement"];?>
                    <a href="vote.php?id=<?php echo $row['id']; ?>">vote eleve</a>
                    <a href="voteprof.php?id=<?php echo $row['id']; ?>">vote entreprise</a>
                </div>
            </div>
        </div><?php
        
    }
}

?>



</body>
</html>