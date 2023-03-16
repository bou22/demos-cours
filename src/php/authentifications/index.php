<?php
// if (!empty($_COOKIE['erreur'])){
//     $erreur = filter_input(INPUT_COOKIE, "erreur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//     setcookie("erreur","",time()-3600*24);
// }

if (!empty($_GET['erreur'])){
    $erreur = filter_input(INPUT_GET, "erreur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>Démo 22 février</title>
</head>
    <body>
        <h1>Réception des infos de formulaire</h1>
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
            <label for="pw">Numéro de passe ?</label><input type="text" name="pw">
            <input type="submit">
            <input type="reset">
        </form>
</body>
</html>