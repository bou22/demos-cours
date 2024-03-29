<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'data/FleurData.classe.php';
require_once 'data/TacheData.classe.php';
require_once 'data/UsersData.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
abstract class ElementHtml {

    protected $liste;

    /**
     * Prépare le bon objet: pattern fabrique.
     */
    public function setListeElement($typeDonnees){

        switch ($typeDonnees) {
            case 'fleurs':
                // $this->liste = new Fleur();
                break;
            
        case 'travaux':
            // $this->liste = new Travaux();
            break;

        case 'users':
            $this->liste = new UsersData();
            break;

        default:
            break;
        }

    }

    abstract public function getItemById($id);
    abstract public function  getElementHtml($typeDonnees, $paramHTML);

}