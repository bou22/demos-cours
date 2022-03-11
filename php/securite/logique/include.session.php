<?php
// Troisième exercice: valider une authentification nom/mdp supporté par une session.
// Authentification refusée: retour sur la page authentification.php
// Authentification acceptée: redirection sur la page confidentielle.php

/**
 * Selon les recommandations de php.net les directives de configurations de session suivantes
 * sont recommandées.
 * Voir la documentation : https://www.php.net/manual/fr/session.security.ini.php
 */

        ini_set("session.cookie_lifetime", 20); // Durée de la session en secondes
        ini_set("session.use_cookies", 1);
        ini_set("session.use_only_cookies" , 1);
        ini_set("session.use_strict_mode", 1);
        ini_set("session.cookie_httponly", 1);
        ini_set("session.cookie_secure", 0);//Pour docker local. Mettre à 1 en production.
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
        ini_set("session.gc_maxlifetime", 30);
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

            if (!empty($_SESSION['expiration']) && $_SESSION['expiration'] < time() - 10) {
                /** Renouvellement de la session complète après 30 sec d'inactivité */
                error_log("Session1 status: ".session_status());
                session_destroy();
                session_commit();
                session_start();
                $_SESSION['expiration']=time();
                $_SESSION['valide'] = "valide";
            } else {
                /** Moins de 30 sec d'inactivité, renouvellement du timestamp et du jeton valide.
                 * Sinon ce dernier pourrait passer dans le Garbage Collector.
                 */
                error_log("Session2 status: ".session_status());
                $_SESSION['expiration']=time();
                $_SESSION['valide'] = "valide";
            }

            return true; //La session est encore valide

        } else {
            /** L'authentification n'est plus valide */
            error_log("Session3 status: ".session_status());
            session_destroy();
            $_SESSION = array();
            session_commit();
            session_gc(); //Enclencher le garbage collector lors de la fin complète; Gobe ressource.

            return false; //La session n'est plus valide
        }
    }

    function creerAuthentification(){
        error_log("Creation de session: Session3 status: ".session_status());
        session_start();
        session_destroy(); // Toutes sessions existantes est détruite
        session_commit();
        session_start();
        $_SESSION['expiration']=time();
        $_SESSION['valide'] = "valide";
    }

    function supprimerSession() {
        error_log("Supprimer Session4 status: ".session_status());
        session_destroy();
        $_SESSION = array();
        session_commit();
        session_gc(); //Enclencher le garbage collector lors de la fin complète.
    }