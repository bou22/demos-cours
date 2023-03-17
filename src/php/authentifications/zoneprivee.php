<?php

if (!empty($_GET['b'])){
    $b = filter_input(INPUT_GET, "b", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

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

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} else {
    // La session existe déjà; ça mérite d'être journalisé
    error_log(date("d/m/Y - G:i:s",time())." La session existait déjà lors de l'accès à la zone privée.\n",3, "/home/claude/logs/acces-application.log");
}

if (!empty($_SESSION['user']) && !empty($_SESSION['authentification']) && !empty($_SESSION['jeton'])){

    //Les variables de la session active existent
    $authentifactionOK = $_SESSION['authentification'];
    $usr = $_SESSION['user'];
    $sessionName = $_SESSION['jeton'];

    if ($sessionName != $b){
        //C'est louche, la session serait ok, mais le nom de session passé en get a changé.
        error_log(date("d/m/Y - G:i:s",time())." Le nom de la session a été changé \n",3, "/home/claude/logs/acces-application.log");
        
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"],$params["secure"], $params["httponly"]);
        }
        session_destroy();

        header("Location: index.php?erreur=louche");
    }

} else {
    //Les variables de la session active n'existent plus; il faut le journaliser et détruire la session/cookie.
    error_log(date("d/m/Y - G:i:s",time())." L'accès à cette page a été refusé: ".__FILE__."\n",3, "/home/claude/logs/acces-application.log");
    
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"],$params["secure"], $params["httponly"]);
    }
    session_destroy();

    header("Location: index.php?erreur=user");
}

//Voir comment gérer les timestamp de session

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
    <h1>Zone privé exclusive à <?php if (!empty($usr)) echo $usr; ?></h1>
</body>
</html>