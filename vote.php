<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet"  href="css/style.css">
    <title>vote eleve</title>
</head>
    <body class="bodyvote">
        <?php
        $servername="localhost";
        $usernameDB = "root";
        $passwordDB ="root";
        $dbname = "intra"

        $conn = new mysqli_connect($servername,$usernameDB,$passwordDB,$dbname);
        if(!$conn){
            die("connection echouee: ".mysqli_connect_error());
        }
?>

        <form action="" method="get">
        <div name ="divvote">
        <button class="good">( ° ͜ʖ °)</button>
        <button class="mid">¯\_(ツ)_/¯</button>
        <button class="bad">( ͡° ʖ̯ ͡°)</button>
    </div>
    </form>
</body>
</html>