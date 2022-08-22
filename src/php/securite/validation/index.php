<?php
    include_once 'include.config.php';
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
            width: 40%;
            margin: 0px auto 0 auto;
            text-align: right;
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
    </style>
        <title>Programmation serveur avec PHP</title>
    </head>
    <body>
        <h1>Protection de l'application par la validation des requêtes du client</h1>
        <form method="get" action="./logique/redirect.validation.php" name="formDonnees" id="formDonnees">
            <label for="entier">Un nombre entier
                <input type="text" name="entier" id="entier">
            </label>
            <label for="float">Un nombre float
                <input type="text" name="float" id="float">
            </label>
            <label for="courriel">Un courriel
                <input type="text" name="courriel" id="courriel">
            </label>
            <label for="url">Un url
                <input type="text" name="url" id="url">
            </label>
            <label for="user">Un nom d'utilisateur
                <input type="text" name="user" id="user">
            </label>
            <label for="mdp">Un mot de passe
                <input type="password" name="mdp" id="mdp" >
            </label>
            <label>
            <input type="button" onclick="formDonnees.submit()" value="Vérifier les valeurs inscrites">
            </label>
        </form>
    </body>
    <script type="text/javascript">
        
        let champsTextes =Array.from(document.getElementsByTagName('input'));

        champsTextes.forEach(function(champ) {
            champ.setAttribute("size","50");
        });
    </script>
</html>