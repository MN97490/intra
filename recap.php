<?php 
session_start();
if ($_SESSION["connexion"] == true) {
 
 } else {
    echo "La connexion n'est pas établie";
    header('Location: http://localhost/intra/connect.php');
    session_destroy();
    session_unset();
 }



	


$servername="localhost";
$username="root";
$password="root";
$db="intra";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);


}

$conn->query("SET NAMES utf8");

$sql = "SELECT nom,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise FROM evenement ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
   $dataPoints = array( 
	array("y" =>  $row["heureuxEleve"],"label" => "Eleve Heureux" ),
	array("y" =>  $row["moyenHeureuxEleve"], "label" => "Eleve Neutre" ),
	array("y" =>  $row["pasHeureuxEleve"], "label" => "Eleve Mecontent" ),
	array("y" =>  $row["heureuxEntreprise"], "label" => "Entreprise Heureux" ),
	array("y" =>  $row["moyenHeureuxEntreprise"], "label" => "Entreprise Neutre" ),
	array("y" =>  $row["pasHeureuxEntreprise"], "label" => "Entreprise Mecontent" )

);

}else {
   echo "Aucun événement trouvé.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css/style.css">
    <script>window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Recapitulatif Evenement"
     },
     axisY: {
         title: "<?php echo $row ["nom"]?>"
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0.## ",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
</script>
</head>
<body class="bodyRecap">


<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div class="titreRecapEvent">
<h1 class="titreEvent">CLASSEMENT EVENEMENT</h1>
</div>
<div  class="RecapComparaison"> 
   <?php 
 $sql = "SELECT nom,date,departement,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise,lieu,heure FROM evenement ORDER BY heureuxEleve DESC ";
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
  



 </tr>
</thead>
<tbody>
 <tr>
   <th scope="row"><?php echo $row["nom"]?></th>
   <td><?php echo $row["date"]?></td> 
   <td><?php echo $row["departement"]?></td>

 
 

   

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




</div>





<div class="footer">
        <p>© 2023 Cegep de Trois-Rivières. Tous droits réservés.</p>
    </div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>

