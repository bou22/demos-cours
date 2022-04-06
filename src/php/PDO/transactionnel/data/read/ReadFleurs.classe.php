<?php
require_once 'Read.abstract.php';
require_once 'connexion/ConnexionPDO.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ReadFleurs extends Read {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fourni une liste.
     */
    public function getListe(){
        $this->setRequete("select * from fleurs");
        $this->selectToutes();

        //PDO::FETCH_COLUMN,1 est ok ici pcq la table contient 2 colonnes.
        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //Avec les éléments soit fleurs soit travaux.
    }

    public function getItemById($id)
    {
        $this->setRequete("select * from fleurs where id=:id");
        $this->selectByid($id);

        return (count($this->liste)>0); //La liste n'est pas vide.
    }

}