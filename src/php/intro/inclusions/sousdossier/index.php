<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dans sous dossier</title>
    </head>
    <body>
        <?php
        //Fichier dans le dossier d'un niveau supérieur.
        include '../Presentation.classe.php'; 
        
        //Une fois le fichier inclus, le code peut être utilisé.
        $demo = new Presentation("Intro PHP", "Utilisation des objets");
        
        //Les fonctions sont ensuite utilisées.
        echo "<h1>".$demo->getTitre()."</h1>";
        echo "<h2>".$demo->getSujet()."</h2>";
        
        //La constante NIVEAU est incluse dans Presentation.classe.php
        echo "<h2>".NIVEAU."</h2>";
        ?>
    </body>
</html>
