<?php
    session_start();

    if(empty($_SESSION['tralala'])){
        header("Location: accessible.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pas non plus accessible</title>
</head>
<body>
    <h1>Pas non plus accessible</h1>
</body>
</html>