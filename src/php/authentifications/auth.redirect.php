<?php
if (!empty($_POST['usr'])){
    $usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT); //Pour le mot de passe, les caractères spéciaux sont recommandés
    
    if($usr === "Joe" && $pwd === "allo"){
        header("Location: index.php?erreur=user");
    } else{
        //Aucunes erreurs la session peut être créée

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

        if (session_status() == PHP_SESSION_NONE) {
            session_name(SESSIONNAME);
            session_start();
            $_SESSION['authentification'] = TRUE;
            $_SESSION['user'] = $usr;
        } else {
            session_destroy();
            $_SESSION = array();

            session_name(SESSIONNAME);
            session_start();
            $_SESSION['authentification'] = TRUE;
            $_SESSION['user'] = $usr;
        }
        //Voir comment gérer les timestamp de session
        header("Location: zoneprivee.php?b=".SESSIONNAME);
    }
} else {
    header("Location: index.php?erreur=vide");
}


