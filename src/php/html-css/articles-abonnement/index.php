<?php 
    require_once './modele/Articles.classe.php';

    $articles = new Articles();
    $article = $articles->getArticleById(1);
    $titres = $articles->getTitres();



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
            <?php
            /** Les données sont récupérées avec fetchAll() */
                foreach ($titres as $titre){
                    echo '<dt><a href="./index.php?article='.$titre[0].'">'.$titre[1].'</a></dt>';
                }
            ?>
        </div>
        <div id="droit">
            <?php
            /** Les données sont récupérées avec fetchObject() */
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