<?php

require_once 'ListeFleurs.abstract.php';
require_once '../connexion/ConnexionPDO.classe.php';

use bdPrintemps\ConnexionPDO;

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeFleursJSON extends ListeFleurs {

    public function __construct()
    {
        $cd = new ConnexionPDO();
        $this->connexion = $cd->getConnexion();
    }

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getListe(){

        $this->selectToutes();

        $this->liste = $this->liste->fetchAll(); //PDO::FETCH_OBJ
        $liste = array();

        foreach ($this->liste as $value) {
            array_push($liste,$value['nom']);
        }

        return json_encode($liste);
    }

    public function getFleurById($id)
    {
        $this->selectByid($id);
        $fleur = $this->liste->fetchObject();

        // Ici aussi il y a une dépendance : le paragraphe est imposé par le code. 
        $liste[$fleur->id] = $fleur->nom;
        return json_encode($liste);
    }

}