<?php
require_once 'Delete.abstract.php';
require_once 'connexion/ConnexionPDO.classe.php';

/**
 * Suppression d'un user par le id.
 * @author Claude
 */
class InsertUser extends Insert {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Réglage de la requête.
     */
    public function execute($objet){
        try {
            $objet->nom = array($objet->nom,PDO::PARAM_STR,255);
            $objet->mdp = array($objet->mdp,PDO::PARAM_STR,255);

            $this->setRequete("insert into users (nom,mdp) values(:nom,:mdp)");
            $this->inserer($objet);
            return $this->resultat->rowCount(); 

        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }

}