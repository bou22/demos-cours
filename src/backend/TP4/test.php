<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tests de validation avec phpUnit</title>
    </head>
    <body>
    <h1>Tests sur les couches</h1>
        <?php
        include_once './data/ControleurData.static.php';
        require_once './html/ControleurHTML.static.php';
        
        echo "Provinces: ";
        echo "<p>". ControleurData::selectProvinces() ."</p>";
        
        echo "Utilisateurs: ";
        echo "<p>". ControleurData::selectUtilisateurs() ."</p>";           
        
        echo "Provinces dropdown<br>";
        echo ControleurHTML::getProvincesDropDown();

        echo "Utilisateurs dropdown<br>";
        echo ControleurHTML::getUtilisateursDropDown();        
        ?>
    </body>
</html>

