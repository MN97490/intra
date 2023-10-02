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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link rel="stylesheet"  href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img\apple-icon-72x72.png"/>
   
</head>
<body class="bodyStat">
    
    <?php 
     $servername="localhost";
     $username="root";
     $password="root";
     $db="intra";
     $_SESSION["modifidE"]="";
     $_SESSION["modiftableE"]="";
     $table = "evenement";

     $conn = new mysqli($servername,$username,$password,$db);

     if($conn->connect_error){
         die("Connection failed:".$conn->connect_error);
    
    
     }
     
     $conn->query("SET NAMES utf8");
    
          
            ?> 
   
<nav id='menu'>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='http://localhost/intra/index.php'>Accueil</a></li>
    <li><a href='http://localhost/intra/creation.php'>Création</a></li>
    <li><a href='http://localhost/intra/stat.php'>Statistiques</a></li>
    <li><a href='http://localhost/intra/choixvote.php'>Vote</a></li>
    <li><a  href='http://localhost/intra/recap.php'>Récapitulatif</a>
    </li>
    <li><a href='http://localhost/intra/gestionusager.php'>Gestion Usager</a></li>
    <li><a class="decoContent" href='http://localhost/intra/deco.php'> <?php echo$_SESSION['user']?>  <img src="img\se-deconnecter.png"  class="decoIcon"alt="Deco"> </a></li>
   
  </ul>
</nav>

<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
   
 

 } else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
    session_unset();
 }
 



 




 $conn = new mysqli($servername,$username,$password,$db);

 if($conn->connect_error){
     die("Connection failed:".$conn->connect_error);


 }
 
 $conn->query("SET NAMES utf8");

 $sql = "SELECT id,nom,date,departement,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise,lieu,heure FROM evenement";
 $result = $conn->query($sql);

 if($result ->num_rows>0){
     while($row=$result->fetch_assoc()){
         
         
       
         ?> 
    
           <table class="table " style="" >
<thead>
 <tr >
 <th scope="col">ID</th>
   <th scope="col" >Nom </th>
   <th scope="col">Date </th>
   <th scope="col">Departement </th>
   <th scope="col">Eleve heureux </th>
   <th scope="col">Eleve neutre </th>
   <th scope="col" >Eleve mecontent </th>
   <th scope="col">Entreprise heureux </th>
   <th scope="col">Entreprise neutre </th>
   <th scope="col">Entreprise mecontent </th>
   <th scope="col">lieu </th>
   <th scope="col">heure </th>
   <th scope="col">Action</th>

 </tr>
</thead>
<tbody>
 <tr>  
 
   <th scope="row"><?php echo $row["id"]?></th>
   <td><?php echo $row["nom"] ?></td>
   <td><?php echo $row["date"]?></td> 
   <td><?php echo $row["departement"]?></td>
   <td><?php echo $row["heureuxEleve"]?></td>
   <td><?php echo $row["moyenHeureuxEleve"]?></td>
   <td><?php echo $row["pasHeureuxEleve"]?></td>
   <td><?php echo $row["heureuxEntreprise"]?></td>
   <td><?php echo $row["moyenHeureuxEntreprise"]?></td>
   <td><?php echo $row["pasHeureuxEntreprise"]?></td>
   <td><?php echo $row["lieu"]?></td>
   <td><?php echo $row["heure"]?></td>
   <td >
                        <form method="post" action="">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                            <input type="hidden" name="table" value="<?php echo $table ?>">
                            <button type="submit" name="deleteButton" class="deleteButton">Supprimer</button>
                        </form>
                       
                        <form method="post" action="modif.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ; $_SESSION["modifidE"]= $row["id"]; ?>">
                            <input type="hidden" name="table" value="<?php echo $table ;$_SESSION["modiftableE"]=$table; ?>">
                            <input type="hidden" name="verif" value="<?php $_SESSION["verifDirectionE"]=true; ?>">
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
  header('Location: stat.php');
  
}

     }
   
   


     
 }else{
     echo "0 results";
 }
 $conn->close();
 

 
 
 ?>




  

</div>

<script src="script.js"></script> 
</body>
</html>