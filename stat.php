<?php
session_start();
unset($_SESSION['verifDirectionU']);
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
    <li><a href='http://localhost/intra/vote.php'>Vote</a></li>
    <li><a  href='http://localhost/intra/recap.php'>Récapitulatif</a>
    </li>
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

 $sql = "SELECT nom,date,departement,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise,lieu,heure FROM evenement";
 $result = $conn->query($sql);

 if($result ->num_rows>0){
     while($row=$result->fetch_assoc()){
         
         
       
         ?> 
    
           <table class="table " style="" >
<thead>
 <tr >
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

 </tr>
</thead>
<tbody>
 <tr>
   <th scope="row"><?php echo $row["nom"]?></th>
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
 

   

 </tr>

</tbody>
</table>



<?php

     }
   
   


     
 }else{
     echo "0 results";
 }
 $conn->close();
 

 
 
 ?>




  

    <div class="footerStat">
    <div class="footerContent">
        <img src="img/logocegep.jpg" class="logocegepFooter" alt="logocegep">
        <p>© Tous droits réservés - Cégep de Trois-Rivières - 2023</p>
    </div>
</div>

<script src="script.js"></script> 
</body>
</html>