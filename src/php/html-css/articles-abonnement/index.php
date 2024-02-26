<?php 
/** Cette démonstration réalise les étapes minimales et nécessaire à la réalisation d'une requête en lecture
 * sur une base de données. Les étapes sont:
 *  - Une connexion sur l'hôte et la base de données ciblées.
 *  - Le passage d'une requête sql sur la base de données
 *  - La récupération des données lues par la requête.
 * 
 * La programmation de ces étapes est pour l'instant une démonstration et nécessite une amélioration, en particulier sur 
 * la modularisation de chaque étape et surtout sur le masquage des infos de connexion. Une bonne pratique de programmation
 * permettra d'économiser du code substantiellement en réutilisant du code de connexion.
 */
    require_once 'config.include.php';

    /** Connexion sur la base de données */
    $dsn = 'mysql:dbname='.MARIADB_NOMBD.';host=127.0.0.1;charset=UTF8';
    $bd = new PDO($dsn, MARIADB_USAGER, MARIADB_PWD);

    /** Sélection de l'article */
    $requete = $bd->query('select titre, texte from articles where id=2');
    $requete->execute();
    $article = $requete->fetchObject();

    /** Sélection des titres seulement pour les liens de gauche */
    $requeteTitres = $bd->query('select titre from articles');
    $requeteTitres->execute();
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
                while ($titre = $requeteTitres->fetchObject()){
                    echo '<dt><a href="">'.$titre->titre.'</a></dt>';
                }
            ?>
        </div>
        <div id="droit">
            <?php
                /** La variable article est un objet dont les attributs sont titre et texte (les colonnes de la Bd) */
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