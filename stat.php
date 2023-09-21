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
 



 

 $sql = "SELECT nom,date,departement,heureuxEleve,moyenHeureuxEleve,pasHeureuxEleve,heureuxEntreprise,moyenHeureuxEntreprise,pasHeureuxEntreprise,lieu,heure FROM evenement";
 $result = query($sql);
 if($result->num_rows>0){
while ($row = $result -> fetch_assoc()){

    echo "nom:" .$row["nom"]. "- Date:". $row["date"]. "departement:". $row["departement"] ."heureuxEleve:" . $row["heureuxEleve"]. "moyenHeureuxEleve:" . $row["moyenHeureuxEleve"]. "pasHeureuxEleve:" . $row["pasHeureuxEleve"]. "heureuxEntreprise:" . $row["heureuxEntreprise"]. "moyenHeureuxEntreprise:" . $row["moyenHeureuxEntreprise"]. "pasHeureuxEntreprise:" . $row["pasHeureuxEntreprise"]. "Lieu:" . $row["lieu"]. "Heure:" . $row["heure"] ."<br>";

}

 }else {
    echo "0 resultats";
 }
 $conn-> close();
?>
    <button  class=" btnIndexStat"><a href="index.php" class="LienIndexStat">index</a></button>
    <button class="btnDeconnexion " id="btnDeconnexion" name="btnDeconnexionStat"> <a href="deco.php" class="LienDecoStat">Deconnexion</a></button>



    <?php 
        
    ?>

<div class="footer">
        <p>© 2023 Cegep de Trois-Rivières. Tous droits réservés.</p>
    </div>
</body>
</html>