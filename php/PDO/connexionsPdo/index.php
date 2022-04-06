<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //namespace demoPDO; // Namespace déclaré au haut du document

            include_once './ListeFleursHTML.classe.php';
            $liste = new ListeFleursHTML();

            echo $liste->getListe();

            echo $liste->getFleurById(2);

       ?>
    </body>
</html>
