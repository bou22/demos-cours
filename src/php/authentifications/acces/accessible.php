<?php
$message = $_COOKIE['erreur'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page accessible</title>
</head>
<body>
    <h1>Bonjour, et <?php echo $message; ?>
    </h1>
</body>
</html>