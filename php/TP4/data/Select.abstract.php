<?php
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
require_once './data/ConnexionData.classe.php';

/**
 * Description de ListeFleurs
 * Classe de récupération des noms de fleurs sur une bd.
 * @author Claude
 */
abstract class Select {
    protected $liste;
    protected $connexion;
    protected $requete;
    
    abstract public function getById($id);
    abstract public function getByInfo($infoJson);
    
    public function getListeTout(){
        try {
            $this->liste = $this->connexion->prepare($this->requete); //retourne pdostatement

            $this->liste->execute();

            return json_encode($this->liste->fetchAll());
            //$this->liste->fetchAll()[0][1];

        } catch (Exception $e){
            error_log($e->getMessage());
        }

    }
}