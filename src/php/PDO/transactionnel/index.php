<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Démos 420-149-AT PDO</title>
        <style>
        body {
            font-family: sans-serif;
            background-color: #222;
            color: #DDD;
        }
        label {
            display: block;
            width: 100%;
            margin: 0px auto 0 auto;
            text-align: left;
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
        span {
            font-size: 0.8em;
            color: #000;
            background-color: yellow;
            display: block;
            width: fit-content;
        }
        .selectFormatGrand {
            font-size: 2em;
            background-color: #000;
            color: #bbb;
            margin-right: 50px;
        }
        .selectFormatPetit {
            font-size: 1em;
            background-color: #444;
            color: #ddd;
            margin-right: 50px;
        }
        </style>
    </head>
    <body>
        <h1>Réalisation de fonctions transactionnelles: requêtes en écriture sur la base de données</h1>

        <?php
            require_once 'gui/ListeSelect.classe.php';
            require_once 'gui/ListeTable.classe.php';
            require_once 'gui/ListeTableFormDelete.classe.php';
            

            $user = new ListeTableFormDelete();
            
            echo $user->getElementHtml("users","name='travaux' id='travaux' class='selectFormatPetit'");
            
       ?>

    </body>
</html>
