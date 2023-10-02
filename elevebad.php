<?php

session_start();

 

$servername = "localhost";
$username = "root";
$password = "root";
$db = "intra";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
 
//$incre = $conn->prepare("UPDATE `evenement` SET `pasHeureuxEleve` = `pasHeureuxEleve` + 1 WHERE `id` = $_GET[id]");
$sql = "UPDATE evenement SET pasHeureuxEleve = pasHeureuxEleve + 1 WHERE id =" . $_GET['id'];
$result = mysqli_query($sql);
header('Location: vote.php?id=' . $_GET['id']);
?>

 