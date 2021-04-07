<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fonction de validation</title>
    </head>
    <body>
        <form name="auth" action="valider.redirect.php" method="post">
        <p>Quel est le prénom du plus grand chanteur ?</p>
            <input type="text" name="nom" placeholder="Inscrivez un nom">
            <input type="button" value="Go" onclick="auth.submit()">
        </form>
    </body>
</html>
