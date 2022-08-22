<?php
    include_once '../include.config.php';
    include_once RACINE.'/logique/include.nonsecure.session.php';

// #1 Vérifier que la session est valide

    if (!authentificationValide()){
        // L'authentification n'existe pas.
        file_put_contents("erreurs-access.log","[".$_SERVER['REMOTE_ADDR']."]  ".date("d F Y")."  Authentification inexistante. - ".$_SERVER['REMOTE_PORT']." - ".$_SERVER['REQUEST_URI']." - ".date("H:i:s")."\n",FILE_APPEND);
        header("Location: ../index.php?erreur=nonsession");
    } else {
        
        if (!empty($_POST['tel'])){
            $tel = filter_input(INPUT_POST,"tel",FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            header("Location: ../index.php?erreur=noTelVide");
        }

    //Cette condition est fermé à la fin du document.
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
        a {
            color: #DDD;
        }
    </style>
        <title>Contenu confidentiel</title>
    </head>
    <body>
        <h3><?php echo __FILE__; ?></h3>
        <a href="confidentielle.php">Système admin</a> | <a href="confidentielle2.php">User admin</a>

        <?php if (isset($tel)) echo "<p>Administrateur $tel ajouté avec tous les honneurs.</p>"; ?>
    </body>
    <script type="text/javascript">
        function formulaire() {
            let formulaire = document.getElementsByTagName('form').item(0)
            let champ = document.createElement('input')
            champ.setAttribute('type','hidden')
            champ.setAttribute('name','autorisation')
            champ.setAttribute('value',localStorage.getItem('autorisation'))
            formulaire.appendChild(champ)
            console.log(formulaire)
            console.log(champ)
            formulaire.submit();
        }
    </script>
</html>
<?php
    }
?>