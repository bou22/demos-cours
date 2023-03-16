<?php
            /**
             * La validation ne sera effectuée seulement si une valeur de nom d'usager est reçue par la requête http.
             */
if (!empty($_POST['usr'])){
    $usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT); //Pour le mot de passe, les caractères spéciaux sont recommandés
    
            /**
             * La vérification if($usr === "Joe" && $pwd === "allo") de la conformité des informations fournies 
             * est hardcodée pour cet exemple. La validation de $usr et de $pwd serait comparé normalement avec des données
             * lues sur une base de données.
             */
    if($usr === "Joe" && $pwd === "allo"){
        //La correspondance des informations est fausse.

        header("Location: index.php?erreur=user");
    } else{
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

        define("SESSIONNAME", hash_hmac($user));
        session_name(SESSIONNAME);

        if (session_status() == PHP_SESSION_NONE) {
            session_name($user);
            session_start();
            $_SESSION['authentification'] = TRUE;
            $_SESSION['user'] = $usr;
            $_SESSION['sessionname'] = SESSIONNAME;

            error_log(" L'usager: ".$user." s'est authentifié.",3, "/home/claude/logs/acces-application.log");
        } else {
                // La session existe déjà, mais ne devrait pas; ça mérite d'être journalisé
            error_log(" L'usager: ".$user." La session existait lors de l'authentification.",3, "/home/claude/logs/acces-application.log");
        }
            //Voir comment gérer les timestamp de session
        header("Location: zoneprivee.php?b=".SESSIONNAME);
    }
} else {
    header("Location: index.php?erreur=vide");
}

