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

$incre = $conn->prepare("UPDATE `evenement` SET `HeureuxEntreprise` = `HeureuxEntreprise` + 1 WHERE `id` = $_GET[id]");
$incre->bind_param("i", $id);
$incre->execute();
$incre->close();
header('Location: voteprof.php');
?>

