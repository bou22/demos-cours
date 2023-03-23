<?php

require_once './auth/gestionSession.include.php';

try {
    //Les anomalies connues sont repérées d'abord.


    if (empty($_GET['b'])){

        throw new Exception("Location: index.php?erreur=jetonabsent");
    }

    //Démarrer la session
    if (getSessionActiveUtilisateur()) {
        
        if (!empty($_SESSION['user']) && !empty($_SESSION['authentification']) && !empty($_SESSION['jeton'])){

            //Les variables de la session active existent

            $authentifactionOK = $_SESSION['authentification'];
            $usr = $_SESSION['user'];
            $jeton = $_SESSION['jeton'];
            $expiration = $_SESSION['expiration'];
            $b = filter_input(INPUT_GET, "b", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            if ($jeton != $b){
                //C'est louche, la session est ok, mais le jeton accordé en authentification a changé; tout détruire.
                //Ou il y a eu un rechargement de page avec F5.
                error_log(date("d/m/Y - G:i:s",time())." Le jeton a été changé \n",3, "/home/claude/logs/acces-application.log");
                
                //C'est une destruction de session.
                supprimerSession();
    
                throw new Exception("Location: index.php?erreur=jeton");
            }
    
            if($expiration > time()){
                //Session non expirée
                session_regenerate_id(FALSE);
                echo session_id();
                define("JETON", hash_hmac('sha256',time(),'dought'));
                $_SESSION['authentification'] = $authentifactionOK;
                $_SESSION['user'] = $usr;
                $_SESSION['expiration'] = time()+10;
                $_SESSION['jeton'] = JETON;            
            } else {
                //C'est une destruction de session.
                supprimerSession();
    
                error_log(date("d/m/Y - G:i:s",time())." Une session expirée a été utilisée. ".$_SERVER['REMOTE_ADDR']."\n",3, "/home/claude/logs/acces-application.log");  
                throw new Exception("Location: index.php?erreur=expiration", 1);
            }
    
        } else {
            //Les variables de la session active n'existent plus; il faut le journaliser et détruire la session/cookie.
    
            error_log(date("d/m/Y - G:i:s",time())." L'accès à cette page a été refusé: ".__FILE__."\n",3, "/home/claude/logs/acces-application.log");
            
            supprimerSession();
    
            throw new Exception("Location: index.php?erreur=user", 1);
        }
    

    } else {
        // La session existe déjà; c'est louche et ça mérite d'être journalisé et détruit
        error_log(date("d/m/Y - G:i:s",time())." La session existait déjà lors de l'accès à la zone privée.\n",3, "/home/claude/logs/acces-application.log");
        

        throw new Exception("Location: index.php?erreur=batter");
        
    }

    //Récupérer les données de la session active


} catch (Exception $e) {

    //Il y a eu un problème. Tout détruire et aviser le client.

    supprimerSession();
        
    header($e->getMessage());

    //Le contenu ci-dessous ne peut pas être accédé par le client.
}

