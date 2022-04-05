<?php
    include_once '../include.config.php';
    include_once RACINE.'/logique/include.session.php';

    if (!authentificationValide()){
        // L'authentification n'existe pas.
        header("Location: ../index.php");
    }
?>

<html>
    <head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: sans-serif;
            background-color: #222;
            color: #DDD;
        }
        label {
            display: block;
            width: 40%;
            margin: 0px auto 0 auto;
            text-align: right;
            font-size: 1em;
        }
        label input {
            margin: 25px 50 0 25;
        }
        table {
            width: 40%;
            border-collapse: collapse;
            margin: 5% auto;
        }
        td, th {
            border: 3px solid #000;
            padding: 2px 2px 2px 10px;
        }
    </style>
        <title>Contenu confidentiel</title>
    </head>
    <body>
        <h3><?php echo __FILE__; ?></h3>
        <a href="confidentielle.php">Confidentielle</a> | <a href="confidentielle2.php">Confidentielle2</a>
    </body>
</html>