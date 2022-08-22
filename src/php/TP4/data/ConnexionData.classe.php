<?php
/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
require_once 'Connexion.abstract.php';
require_once './data/config.inc.php';
    
class ConnexionData extends Connexion {

    /**
     * Connexion sur la base de données ciblé par le fichier de config.
     */
    public function getConnexion() {
        try {
            $this->connexion = new PDO(DSN, UTILISATEUR, MDP);
            return $this->connexion;
        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}