<?php
session_start();
include_once 'include.config.php';
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
        <title>Programmation serveur avec PHP</title>
    </head>
    <body>
        <h1>Résultat de la validation de chacun des champs</h1>
        <ul>
        <?php
        foreach ($_SESSION as $key => $value) {
            # Lecture de chaque index de la session
            echo "<li>".$key.": ".$value."</li>";
        }
        ?>
        </ul>
    </body>
    <script type="text/javascript">
        let champsTextes =Array.from(document.getElementsByTagName('input'));

        champsTextes.forEach(function(champ) {
            champ.setAttribute("size","50");
        });
    </script>
</html>