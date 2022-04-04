<?php
require_once 'Liste.abstract.php';
require_once './connexion/ConnexionPDO.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeTravaux extends Liste {

    public function __construct()
    {
        $cd = new ConnexionPDO();
        $this->connexion = $cd->getConnexion();
    }

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getListe(){
        $this->setRequete("select * from travaux");
        $this->selectToutes();

        //PDO::FETCH_COLUMN,1 est ok ici pcq la table contient 2 colonnes.
        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //Avec les éléments soit fleurs soit travaux.
    }

    public function getItemById($id)
    {
        $this->setRequete("select * from travaux where id=:id");
        $this->selectByid($id);

        return $this->liste->fetchAll(PDO::FETCH_COLUMN,1); //La liste n'est pas vide.
    }

}