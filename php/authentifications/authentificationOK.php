<?php 
/**
 * La configuration et le démarrage des sessions doit être fait avant le début 
 * de l'envoi de la réponse.
 */

require_once 'auth.session.php';

    session_name("auth");
    session_start();
    
    if (isset($_SESSION['infoAuth'])){
        $nom = $_SESSION['infoAuth'];

    } else {
        header("Location: index.php");      
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Ici c'est la zone protégée pour ".$nom;
        ?>
    </body>
</html>
