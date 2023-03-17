<?php

define("BDUSERS",array("Joe"=>password_hash("allo",PASSWORD_DEFAULT),"Guy"=>password_hash("lafleur",PASSWORD_DEFAULT),"radiohead"=>password_hash("okcomputor",PASSWORD_DEFAULT)));

if (!empty($_POST['usr'])){
    $usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT); //Pour le mot de passe, les caractères spéciaux sont recommandés

    if(isset(BDUSERS[$usr]) && password_verify($pwd,BDUSERS[$usr])){

        //Aucunes erreurs ou mauvaise information, la session peut être créée

        ini_set("session.cookie_lifetime", 0);
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies" , 1);
        ini_set("session.use_strict_mode", 1);
        ini_set("session.cookie_httponly", 1);
        ini_set("session.cookie_secure", 1);
        ini_set("session.cookie_samesite" , "Strict");
        ini_set("session.cache_limiter" , "nocache");
        ini_set("session.sid_length" , 48);
        ini_set("session.sid_bits_per_character" , 6);
        ini_set("session.hash_function" , "sha512");

        define("JETON", hash_hmac('sha256',time(),'allo'));
        session_name("demoAuth");
        
        if (session_status() == PHP_SESSION_NONE) {

            session_start();
            $_SESSION['authentification'] = TRUE;
            $_SESSION['user'] = $usr;
            $_SESSION['jeton'] = JETON;

        } else {
            // La session existe déjà, mais ne devrait pas; ça mérite d'être journalisé
            error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." La session existait lors de l'authentification.\n",3, "/home/claude/logs/acces-application.log");
        }

        //Voir comment gérer les timestamp de session

        error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." s'est authentifié.\n",3, "/home/claude/logs/acces-application.log");
        header("Location: zoneprivee.php?b=".JETON);

    } else {        
        //La correspondance des informations est fausse.

        header("Location: index.php?erreur=user");
    } 
} else {
    //Il semble qu'aucune information ne soit reçue. C'est un risque de
    // requête curl. Ça mérite une journalisation.

    error_log(date("d/m/Y - G:i:s",time())." Une requête sans paramètre a été passée.\n",3, "/home/claude/logs/acces-application.log");
    header("Location: index.php?erreur=vide");
}

