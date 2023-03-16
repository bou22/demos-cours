<?php
    setcookie("info","bonjour");
    if (!empty($_COOKIE['info'])){
        $monCookie = $_COOKIE['info'];
    } else {
        $monCookie = "vide";
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les cookies</title>
</head>
<body>
<?php
    echo $monCookie;
?>
</body>
</html>