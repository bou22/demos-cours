<?php
require_once 'Select.abstract.php';
require_once './data/ConnexionData.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class SelectProvince extends Select {

    public function __construct()
    {
        $cd = new ConnexionData();
        $this->connexion = $cd->getConnexion();
        
        $this->requete = "SELECT * FROM province";
    }

    public function getById($id) {

    }
    
    public function getByInfo($infoJson) {
        
    }

}