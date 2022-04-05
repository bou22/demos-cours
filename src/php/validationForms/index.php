<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Authentification</title>
    </head>
    <body>
        <form name="auth" action="auth.redirect.php" method="post">
            <input type="text" name="nom" placeholder="Nom d'usager">
            <input type="password" name="mdp" placeholder="Mot de passe">
            <input type="button" value="Go" onclick="auth.submit()">
        </form>
    </body>
</html>
