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
$_SESSION["connexion"] = true;
echo "La connexion est réussie" . $_SESSION["connexion"];

session_destroy();
session_set_cookie_params(20);
ini_set('session.use_only_cookies', 1);
?>
    
</body>
</html>