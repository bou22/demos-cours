<?php
// Troisième exercice: valider une authentification nom/mdp supporté par une session.
// Authentification refusée: retour sur la page authentification.php
// Authentification acceptée: redirection sur la page confidentielle.php

/**
 * Selon les recommandations de php.net les directives de configurations de session suivantes
 * sont recommandées.
 * Voir la documentation : https://www.php.net/manual/fr/session.security.ini.php
 */

 define("DUREE_SESSION",60*60);//Utilisée pour le cookie et timestamp.
 
        ini_set("session.cookie_lifetime", DUREE_SESSION); // Durée de la session en secondes
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies" , 1);
        ini_set("session.use_strict_mode", 1);
        ini_set("session.cookie_httponly", 1);
        ini_set("session.cookie_secure", 0);//Pour docker local. Mettre à 1 en production sur techninfo420.
        ini_set("session.cookie_samesite" , "Strict");
        ini_set("session.trans_sid_hosts",$_SERVER['HTTP_HOST']);
        ini_set("session.referer_check",$_SERVER['HTTP_HOST']); //Pourrait casser !
        ini_set("session.cache_limiter" , "nocache");
        ini_set("session.sid_length" , 48);
        ini_set("session.sid_bits_per_character" , 6);
        ini_set("session.hash_function" , "sha256");

        /** Avec les 3 settings ci-dessous,
         * 90% probable que les données de session soient effacées après 30 secondes de vies, 
         * lors de la création d'une nouvelle session.
         * L'utilisation du GC en lien avec une requête sur le serveur
         * n'est pas souhaitable parce que la requête sera rallentie.
         * https://www.php.net/manual/fr/function.session-gc.php
         */
        ini_set("session.gc_maxlifetime", DUREE_SESSION);
        ini_set("session.gc_probability",90);
        ini_set("session.gc_divisor",100);

        session_name("cb");

        /**
         * Vérification de la validité d'une authentification existante:
         * #1: après 30 secondes d'inactivité le jeton de session est renouvellé
         * #2: session terminé
         */
    function authentificationValide(){

        session_start();

        if (!empty($_SESSION['valide']) && $_SESSION['valide'] == "valide") {

            /** Une authentification existe */

            session_regenerate_id(false); //Le jeton est regénéré
            
            $_SESSION['expiration']=time();
            $_SESSION['valide'] = "valide";

            return true; //La session est encore valide

        } else {
            /** L'authentification n'est plus valide */
            
            supprimerSession();
            
            return false; //La session n'est plus valide
        }
    }

    function creerAuthentification(){
        supprimerSession();//Pour éviter toutes possibilités de récupération de session
        session_start();
        $_SESSION['expiration']=time();
        $_SESSION['valide'] = "valide";
        setTokenCsrfSession();
    }

    function supprimerSession() {
        session_start();
        session_gc(); //Enclencher le garbage collector lors de la fin complète.
        session_destroy();
        $_SESSION = array();
        session_commit();
    }

    function setFormToken(){
        $script = '<script type="text/javascript">';
        $script .= 'sessionStorage.setItem("autorisation","'.$_SESSION['csrfToken'].'")';
        $script .= '</script>';

        return $script;
    }

    function formTokenValide($token){

        $valide = ($token === $_SESSION['csrfToken']);

        if(!$valide){

            error_log("----------------------------------------");
            error_log("CSRF: ".$token." | token fautif");
        }

        return $valide;
    }

    function setTokenCsrfSession(){
        $_SESSION['csrfToken'] = hash_hmac('sha512', time(), $_SERVER['SERVER_ADDR']);
    }