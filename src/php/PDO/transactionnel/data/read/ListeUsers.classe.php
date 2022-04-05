<?php
require_once 'Liste.abstract.php';
require_once 'data/connexion/ConnexionPDO.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeUsers extends Liste {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getListe(){
        $this->setRequete("select id,nom from users");
        $this->selectToutes();

        return $this->liste->fetchAll(); //Avec les éléments soit fleurs, soit travaux, soit users.
    }

    public function getItemById($id)
    {
        $this->setRequete("select * from travaux where id=:id");
        $this->selectByid($id);

        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //La liste n'est pas vide.
    }

}