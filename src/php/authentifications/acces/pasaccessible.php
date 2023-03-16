<?php
    session_start();

    if(empty($_SESSION['user'])){
        header("Location: accessible.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pas accessible</title>
</head>
<body>
    <h1>Pas accessible</h1>
</body>
</html>