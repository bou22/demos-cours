<?php
    include_once 'include.config.php';
    include_once RACINE.'/logique/include.erreurForm.php';
    session_start();
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
            background-color: yellowgreen;
        }
    </style>
        <title>Programmation serveur avec PHP</title>
    </head>
    <body>
        <h1>Protection de l'application par la validation des requêtes du client</h1>
        <form method="get" action="./logique/include.validation.php" name="formDonnees" id="formDonnees">
            <label for="entier">Un nombre entier</label>
                <input type="text" name="entier" id="entier"
                <?php if (isset($_SESSION["entier"])) echo "value=".$_SESSION["entier"]; ?>
                >
            
                <?php
                    if (isset($erreursRecues["entier"]) && $erreursRecues["entier"]===0) {
                        echo "<span>Utiliser un nombre entier uniquement.</span>";
                    }
                ?>
            <label for="float">Un nombre float</label>
                <input type="text" name="float" id="float"
                <?php if (isset($_SESSION["float"])) echo "value=".$_SESSION["float"]; ?>
                >
            
            <?php
                    if (isset($erreursRecues["float"]) && $erreursRecues["float"]===0) echo "<span>Utiliser un nombre à point flottant avec un '.'.</span>";
             ?>

            <label for="courriel">Un courriel</label>
                <input type="text" name="courriel" id="courriel"
                <?php if (isset($_SESSION["courriel"])) echo "value=".$_SESSION["courriel"]; ?>
                >
            
            <?php
                    if (isset($erreursRecues["courriel"]) && $erreursRecues["courriel"]===0) echo "<span>Utiliser un adresse courriel en format valide.</span>";
            ?>
            <label for="url">Un url</label>
                <input type="text" name="url" id="url" 
                <?php if (isset($_SESSION["url"])) echo "value=".$_SESSION["url"]; ?>
                >
            
            <?php
                    if (isset($erreursRecues["url"]) && $erreursRecues["url"]===0) {
                        echo "<span>Utiliser un URL au format valide.</span>";
                    } 
                ?>
            <label for="user">Un nom d'utilisateur</label>
                <input type="text" name="user" id="user">
            
            <?php
                    if ( (isset($erreursRecues["user"]) && $erreursRecues["user"]===0) || (isset($erreursRecues["mdp"]) && $erreursRecues["mdp"]===0) ) 
                        echo "<span>Votre nom d'usager et/ou mot de passe contient un/des caractère(s) non-valide(s).</span>";
                ?>
            <label for="mdp">Un mot de passe</label>
                <input type="password" name="mdp" id="mdp" >
            

            <label></label>
            <input type="button" onclick="formDonnees.submit()" value="Vérifier les valeurs inscrites">
            
        </form>
    </body>
    <script type="text/javascript">
        let champsTextes =Array.from(document.getElementsByTagName('input'));

        champsTextes.forEach(function(champ) {
            champ.setAttribute("size","10");
        });
    </script>
</html>