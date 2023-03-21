<?php

try {
    //Les anomalies connues sont repérées d'abord.


    if (empty($_GET['b'])){

        throw new Exception("Location: index.php?erreur=louche");
    }

    //Paramétrer la session
    {
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
    }


    //Démarrer la session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } else {
        // La session existe déjà; c'est louche et ça mérite d'être journalisé et détruit
        error_log(date("d/m/Y - G:i:s",time())." La session existait déjà lors de l'accès à la zone privée.\n",3, "/home/claude/logs/acces-application.log");
        
        //C'est une destruction de session.
        if (session_status() === PHP_SESSION_ACTIVE) {

            $_SESSION = array();
            $parametres = session_get_cookie_params();
            setcookie(session_name(), "", time() - 42000, $parametres["path"], $parametres["domain"],$parametres["secure"], $parametres["httponly"]);
            session_destroy();
        }
        throw new Exception("Location: index.php?erreur=batter");
        
    }

    //Récupérer les données de la session active

    if (!empty($_SESSION['user']) && !empty($_SESSION['authentification']) && !empty($_SESSION['jeton'])){

        //Les variables de la session active existent

        $authentifactionOK = $_SESSION['authentification'];
        $usr = $_SESSION['user'];
        $jeton = $_SESSION['jeton'];
        $b = filter_input(INPUT_GET, "b", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($jeton != $b){
            //C'est louche, la session est ok, mais le jeton accordé en authentification a changé; tout détruire.
            error_log(date("d/m/Y - G:i:s",time())." Le nom de la session a été changé \n",3, "/home/claude/logs/acces-application.log");
            
            //C'est une destruction de session.
            if (session_status() === PHP_SESSION_ACTIVE) {

                $_SESSION = array();
                $parametres = session_get_cookie_params();
                setcookie(session_name(), "", time() - 42000, $parametres["path"], $parametres["domain"],$parametres["secure"], $parametres["httponly"]);
                session_destroy();
            }

            throw new Exception("Location: index.php?erreur=louche");
        }

    } else {
        //Les variables de la session active n'existent plus; il faut le journaliser et détruire la session/cookie.

        error_log(date("d/m/Y - G:i:s",time())." L'accès à cette page a été refusé: ".__FILE__."\n",3, "/home/claude/logs/acces-application.log");
        
        if (session_status() === PHP_SESSION_ACTIVE) {

            $_SESSION = array();
            $parametres = session_get_cookie_params();
            setcookie(session_name(), "", time() - 42000, $parametres["path"], $parametres["domain"],$parametres["secure"], $parametres["httponly"]);
            session_destroy();
        }

        throw new Exception("Location: index.php?erreur=user", 1);
    }

} catch (Exception $e) {

    //Il y a eu un problème. Tout détruire et aviser le client.

    if (session_status() === PHP_SESSION_ACTIVE) {

        $_SESSION = array();
        $parametres = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000, $parametres["path"], $parametres["domain"],$parametres["secure"], $parametres["httponly"]);
        session_destroy();
    }
        
    header($e->getMessage());

    //Le contenu ci-dessous ne peut pas être accédé par le client.
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone privée</title>
</head>
<body>
    <h1>Zone privée exclusive à <?php if (!empty($usr)) echo $usr; ?></h1>
</body>
</html>