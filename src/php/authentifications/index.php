<?php
if (!empty($_GET['erreur'])){
    $erreur = filter_input(INPUT_GET, "erreur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>Démo d'une authentification</title>
</head>
    <body>
        <h1>Démonstration d'une authentification protégée</h1>
        <form action="auth.redirect.php" method="post">

        <?php
            if (!empty($erreur)){
                switch ($erreur) {
                    case 'vide':
                        echo "<p>Vous devez inscrire ces informations.</p>";
                        break;
                    case 'user':
                        echo "<p>La combinaison usager/mot de passe n'est pas valide.</p>";
                        break;                    
                    default:
                        echo "<p>Une erreur est survenue.</p>";
                        break;
                }
            }
        ?>

            <label for="usr">Vous êtes ? </label><input type="text" name="usr">
            <label for="pw">Numéro de passe ?</label><input type="password" name="pwd">
            <input type="submit">
            <input type="reset">
        </form>
</body>
</html>