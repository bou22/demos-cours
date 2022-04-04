<html>
    <head>
    <meta charset="utf-8">
    <style>
        table {
            width: 70%;
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
        <h1>Inclusion de ressources PHP</h1>
        <?php
            include_once 'include.config.php';
            
            include_once RACINE.'/gui/include.donneesHtml.php';
        ?>
    </body>
</html>