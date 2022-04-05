<?php

namespace bdPrintemps;

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
require_once 'Connexion.abstract.php';

class ConnexionPDO extends Connexion {

    /**
     * Connexion sur la base de données ciblé par le fichier de config.
     */
    public function getConnexion() {
        try {
            require_once 'config.inc.php';
            $dsn = "mysql:dbname=".DATABASE.";host=".DOCKER_HOST.";charset=utf8;port=3306;";

            $this->connexion = new \PDO($dsn, DOCKER_UTILISATEUR, DOCKER_MDP);
            return $this->connexion;
            
        } catch (Exception $e){
            error_log("Connexion PDO: ".$e->getMessage());
            // header("Location: erreurs.php?message=erreur inopiné: 10-10-710");
        }
    }
}