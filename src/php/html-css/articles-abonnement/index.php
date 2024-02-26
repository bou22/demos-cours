<?php 
    require_once 'config.include.php';

    $dsn = 'mysql:dbname='.MARIADB_NOMBD.';host=127.0.0.1;charset=UTF8';
    $bd = new PDO($dsn, MARIADB_USAGER, MARIADB_PWD);

    $requete = $bd->query('select titre, texte from articles where id=2');
    $requete->execute();
    $article = $requete->fetchObject();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Abonnement nécessaire pour lire plus de 3 articles</title>
</head>
<body>
    <section id="principale">
        <div id="gauche">
            <dl>Articles récents</dl>
            <dt><a href="">Titre 2</a></dt>
            <dt><a href="">Titre 2</a></dt>
            <dt><a href="">Titre 2</a></dt>
            <dt><a href="">Titre 2</a></dt>
            <dt><a href="">Titre 2</a></dt>
        </div>
        <div id="droit">
            <?php
                echo "<h1>".$article->titre."</h1>";

                echo "<p>".$article->texte."</p>";
            ?>
      
        </div>
    </section>
    <section id="pied">
        <div>
            <dl>
                <dt>Liens externes</dt>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
            </dl>
        </div>
        <div>
            <dl>
                <dt>Liens externes</dt>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
            </dl>
        </div>
        <div>
            <dl>
                <dt>Liens externes</dt>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
                <dd><a href="">Titre 2</a></dd>
            </dl>
        </div>
    </section>
</body>
</html>