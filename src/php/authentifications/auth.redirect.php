<?php
/**
 * On commence par vérifier la présence d'anomalie dans la requête (en ajouter lorsque nécessaires).
 */

try { 

    if (!isset($_SERVER['HTTPS'])){
        //La requête n'est pas sur TLS: refuser et informer.

        throw new Exception("Location: https://".$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF'])."/index.php?erreur=tls");
    }

    if (empty($_POST['usr']) && empty($_POST['pwd'])){
        //Il semble qu'aucune information ne soit reçue. C'est un risque de requête curl. Ça mérite une journalisation.

        error_log(date("d/m/Y - G:i:s",time())." Une requête sans paramètre a été passée.\n",3, "/home/claude/logs/acces-application.log");
        throw new Exception("Location: index.php?erreur=vide");
    }

    if (empty($_POST['usr']) || empty($_POST['pwd'])){
        //Une des informations est manquante; il faut aviser le client.
        throw new Exception("Location: index.php?erreur=vide");
    }



/**
 * À partir d'ici le traitement de l'authentification peut commencer.
 */

    //Substitue d'une base de données
    define("BDUSERS",array("Joe"=>password_hash("allo",PASSWORD_DEFAULT),"Guy"=>password_hash("lafleur",PASSWORD_DEFAULT),"radiohead"=>password_hash("okcomputor",PASSWORD_DEFAULT)));

   
    // Pour faire sûr que les possibilités d'erreurs sont récupérées.

    $usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT); //Pour le mot de passe, les caractères spéciaux sont recommandés, donc acceptés

    if(isset(BDUSERS[$usr]) && password_verify($pwd,BDUSERS[$usr])){ // AUTHENTIFICATION !!!

        //Aucunes erreurs ou mauvaise information, la session peut être créée
        //https://www.php.net/manual/en/session.security.ini.php

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

        define("JETON", hash_hmac('sha256',time(),'dought'));
        session_name("demoAuth");
        
        if (session_status() == PHP_SESSION_NONE) {

            session_start();
            $_SESSION['authentification'] = TRUE;
            $_SESSION['user'] = $usr;
            $_SESSION['jeton'] = JETON;
            $_SESSION['expiration'] = time()+10; //durée de 10sec
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

        } else {
            // La session existe déjà, mais ne devrait pas; ça mérite d'être journalisé
            error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." La session existait lors de l'authentification.\n",3, "/home/claude/logs/acces-application.log");
        }

        //Tout est ok; rediriger vers la zone sécurisée

        error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." s'est authentifié.\n",3, "/home/claude/logs/acces-application.log");
        
        header("Location: zoneprivee.php?b=".JETON);

    } else {        
        //La correspondance des informations est fausse.
        throw new Exception("Location: index.php?erreur=user");
    }


} catch (Exception $e){
    //Une erreur non identifiée s'est produit: journaliser et détruire la session
    
    if (session_status() === PHP_SESSION_ACTIVE) {

        $_SESSION = array();
        $parametres = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000, $parametres["path"], $parametres["domain"],$parametres["secure"], $parametres["httponly"]);
        session_destroy();
    }

    header($e->getMessage());
}

