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
 
$incre = $conn->prepare("UPDATE `evenement` SET `HeureuxEleve` = `HeureuxEleve` + 1 WHERE `id` = 1");
$incre->bind_param("i", $id);
$id = 1;
$incre->execute();
$incre->close();
header('Location: index.php');
?>

 