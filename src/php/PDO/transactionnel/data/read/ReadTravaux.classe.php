<?php
require_once 'Read.abstract.php';
require_once 'connexion/ConnexionPDO.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ReadTravaux extends Read {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fourni une liste.
     */
    public function getListe(){
        $this->setRequete("select * from travaux");
        $this->selectToutes();

        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //Avec les éléments soit fleurs soit travaux.
    }

    public function getItemById($id)
    {
        $this->setRequete("select * from travaux where id=:id");
        $this->selectByid($id);

        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //La liste n'est pas vide.
    }

}