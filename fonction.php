
    <?php
    

 if ($_SESSION["connexion"] == true) {
  
 } else {
    echo "La connexion n'est pas établie";
    header('Location: connect.php');
    session_destroy();
    session_unset();
 }
 //creez la connection
 include 'log.php';
 $conn = new mysqli($servername,$usernameDB,$passwordDB,$dbname);
if($conn->connect_error){
 die("Connection failed:".$conn->connect_error);


}

$conn->query("SET NAMES utf8");
function verifierStatutAdministrateur($conn, $nom_utilisateur) {
    // Vérifie si l'utilisateur a le statut d'administrateur
    $sql = "SELECT administrateur FROM usager WHERE user = '$nom_utilisateur'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $statut_administrateur = (int) $row['administrateur'];

        if ($statut_administrateur === 1) {
            return true; // L'utilisateur est administrateur
        } else {
            return false; // L'utilisateur n'est pas administrateur
        }
    } else {
      
        echo "Erreur : " . mysqli_error($conn);
        return false; 
    }
}


$nom_utilisateur = $_SESSION['user'];
if (verifierStatutAdministrateur($conn, $nom_utilisateur)) {
   
} else {
   
    header('Location: index.php');
}

function deleteRecord($conn, $id,$table) {
    $sql = "DELETE FROM $table WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
}

function modifRecord($conn, $id,$table) {
    $sql = "UPDATE $table SET  WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $conn->error;
    }
    
    $conn->close();
}



?>
