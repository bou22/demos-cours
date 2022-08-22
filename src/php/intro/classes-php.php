<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './Demo.classe.php';
        
        $demo = new Demo("Intro PHP", "Utilisation des objets");
        
        echo "<h1>".$demo->getTitre()."</h1>";
        echo "<h2>".$demo->getSujet()."</h2>";
        ?>
    </body>
</html>
