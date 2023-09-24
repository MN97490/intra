<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css/style.css">
   
</head>
<body class="bodyStat">

<?php
// Set session variables

if ($_SESSION["connexion"] == true) {
    echo "La connexion est réussie";
 

 } else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
 }
 



 


 $servername="localhost";
 $username="root";
 $password="root";
 $db="intra";

 $conn = new mysqli($servername,$username,$password,$db);

 if($conn->connect_error){
     die("Connection failed:".$conn->connect_error);


 }
 echo "Connected successfully";
 $conn->query("SET NAMES utf8");

 $sql = "SELECT nom,date,departement,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise,lieu,heure FROM evenement";
 $result = $conn->query($sql);

 if($result ->num_rows>0){
     while($row=$result->fetch_assoc()){
         
         
       //  echo "id:". $row["id"]. "- url ". $row["url"]."- Marque:". $row["marque"]."-Modele". $row["modele"]."- couleur".$row["couleur"]."<br>";
         ?> 
         
           <table class="table" style="" >
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


    <button  class=" btnIndexStat"><a href="index.php" class="LienIndexStat">index</a></button>
    <button class="btnDeconnexion " id="btnDeconnexion" name="btnDeconnexionStat"> <a href="deco.php" class="LienDecoStat">Deconnexion</a></button>



  

<div class="footer">
        <p>© 2023 Cegep de Trois-Rivières. Tous droits réservés.</p>
    </div>
</body>
</html>