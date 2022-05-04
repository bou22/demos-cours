<?php
    include_once 'include.config.php';
    include_once RACINE.'/logique/include.erreurForm.php';
    include_once RACINE.'/logique/include.session.php';
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
        <form method="post" action="./logique/redirect.authentification.nonsecure.php" name="formDonnees" id="formDonnees">
            <label for="user">Un nom d'utilisateur </label>
                <input type="text" name="user" id="user">
<?php
//Afficher une erreur de validation
    if ( (isset($erreursRecues["user"]) && $erreursRecues["user"]===0)) 
            echo "<span>L'information n'est pas valide.</span>";
?>
           
            <label></label>
            <input type="button"  onclick="formulaire()" value="Vérifier les valeurs inscrites">
            
        </form>
    </body>
    <script type="text/javascript">
        let champsTextes =Array.from(document.getElementsByTagName('input'));

        champsTextes.forEach(function(champ) {
            champ.setAttribute("size","40");
        });
    </script>
    <script type="text/javascript">
        function formulaire() {
            let formulaire = document.getElementsByTagName('form').item(0)
            formulaire.submit()
        }
    </script>    
</html>