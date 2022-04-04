<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //La requête et ses variables sont placés dans 
        //les variables d'environnement (super-globales).
        $nom = $_POST['name'];
        $categorie  = $_POST['category'];
        $priorite = $_POST['priority'];
        ?>
        
        <!-- Affichage des informations reçues de la requête. -->
        <p><?php echo $nom; ?></p>
        <p><?php echo $categorie; ?></p>
        <p><?php echo $priorite; ?></p>
    </body>
</html>
