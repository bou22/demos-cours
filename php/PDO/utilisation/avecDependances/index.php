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
        }
    </style>
    </head>
    <body>
        <h1>Utilisation de données dynamiques dans un interface graphique</h1>

        <?php
            //Cet exemple utilise un namespace: namespace bdPrintemps; dans le dossier ./connexion

            include_once './ListeFleursHtml.classe.php';
            $liste = new ListeFleursHtml();
            echo $liste->getListe();
       ?>

       <h2>Une seule fleur sélectionnée par le id</h2>
       <?php
            $selection = new ListeFleursHtml();
            echo "<p>".$selection->getFleurById(2)."</p>";
       ?>
    </body>
</html>
