<?php

require_once './auth/gestionSession.include.php';

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


    $usr = filter_input(INPUT_POST, "usr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd = filter_input(INPUT_POST, "pwd", FILTER_DEFAULT); //Pour le mot de passe, les caractères spéciaux sont recommandés, donc acceptés


    // AUTHENTIFICATION !!!
    if(isset(BDUSERS[$usr]) && password_verify($pwd,BDUSERS[$usr])){ 

        //Aucunes erreurs ou mauvaise information, la session peut être créée.
        //https://www.php.net/manual/en/session.security.ini.php

        define("JETON", hash_hmac('sha256',time(),'dought'));

        if (setNouvelleSessionUtilisateur($usr,JETON)){
            //Tout est ok; rediriger vers la zone sécurisée

            error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." s'est authentifié.\n",3, "/home/claude/logs/acces-application.log");
            header("Location: zoneprivee.php?b=".JETON);

        } else {
            error_log(date("d/m/Y - G:i:s",time())." L'usager: ".$usr." La session existait lors de l'authentification.\n",3, "/home/claude/logs/acces-application.log");
        }

    } else {        
        //La correspondance des informations est fausse.
        throw new Exception("Location: index.php?erreur=user");
    }


} catch (Exception $e){
    //Une erreur non identifiée s'est produite détruire la session
    
    supprimerSession();

    header($e->getMessage());
}

