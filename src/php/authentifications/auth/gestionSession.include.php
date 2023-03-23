<?php

/**
 * Démarrage d'une session attribuée à un utilisateur
 */
function setSessionUtilisateur($usr, $jeton){
    $sessionOk = FALSE;

    if (session_status() == PHP_SESSION_NONE) {

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

        
        session_name("demoAuth");

        session_start();
        $_SESSION['authentification'] = TRUE;
        $_SESSION['user'] = $usr;
        $_SESSION['jeton'] = $jeton;
        $_SESSION['expiration'] = time()+10; //durée de 10sec
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

        $sessionOk = TRUE;
    }

    return $sessionOk; //Mise à TRUE si la session a bien été créée.

}