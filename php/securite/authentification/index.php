<?php
    include_once 'include.config.php';
    include_once RACINE.'/logique/include.erreurForm.php';
?>

<html>
    <head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: sans-serif;
            background-color: #222;
            color: #DDD;
        }
        label {
            display: block;
            width: 100%;
            margin: 0px auto 0 auto;
            text-align: left;
            font-size: 1em;
        }
        label input {
            margin: 25px 50 0 25;
        }
        table {
            width: 40%;
            border-collapse: collapse;
            margin: 5% auto;
        }
        td, th {
            border: 3px solid #000;
            padding: 2px 2px 2px 10px;
        }
        span {
            font-size: 0.8em;
            color: #000;
            background-color: yellow;
            display: block;
            width: fit-content;
        }
    </style>
        <title>Sécurité des sessions</title>
    </head>
    <body>
        <h1>Gestion de la session en contexte d'authentification</h1>
        <form method="post" action="./logique/redirect.authentification.php" name="formDonnees" id="formDonnees">
            <label for="user">Un nom d'utilisateur </label>
                <input type="text" name="user" id="user">
            <?php
                if ( (isset($erreursRecues["user"]) && $erreursRecues["user"]===0) || (isset($erreursRecues["mdp"]) && $erreursRecues["mdp"]===0) ) 
                        echo "<span>La combinaison nom d'usager/mot de passe n'est pas valide.</span>";
            ?>
            
            <label for="mdp">Un mot de passe </label>
                <input type="password" name="mdp" id="mdp" >
           
            <label></label>
            <input type="button" onclick="formDonnees.submit()" value="Vérifier les valeurs inscrites">
            
        </form>
    </body>
    <script type="text/javascript">
        let champsTextes =Array.from(document.getElementsByTagName('input'));

        champsTextes.forEach(function(champ) {
            champ.setAttribute("size","40");
        });
    </script>
</html>