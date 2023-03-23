<?php
    require_once './auth/validationSessionHeader.include.php';

    if(!empty($_SESSION['authentification']) && $_SESSION['authentification']){
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone privée</title>
</head>
<body>
    <h1>Zone privée exclusive à <?php if (!empty($usr)) echo $usr; ?></h1>
    <?php
        try {
            if (defined("JETON") && output_add_rewrite_var("b", JETON)){
                echo "<a href='autrezoneprivee.php'>Index</a>";
    
                echo "<form method='post' action=autrezoneprivee.php>";
                echo "<label>Le formulaire contient un champ caché.</label>";
                echo "</form>";
            } else {
                throw new Exception("La réécriture du output a échoué", 1);
            }

        } catch (Exception $e){
            error_log(date("d/m/Y - G:i:s",time()).$e->getMessage()." \n",3, "/home/claude/logs/acces-application.log");
            echo "Une erreur est survenue";
        }

    ?>
</body>
</html>

<?php
   } else {

    include_once './auth/validationSessionFooter.include.php';
} 

?>