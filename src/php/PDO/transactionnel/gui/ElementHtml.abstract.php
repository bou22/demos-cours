<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'data/Fleur.classe.php';
require_once 'data/Travaux.classe.php';
require_once 'data/Users.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
abstract class ElementHtml {

    protected $liste;

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function setListeElement($typeDonnees){

        switch ($typeDonnees) {
            case 'fleurs':
                $this->liste = new Fleur();
                break;
            
        case 'travaux':
            $this->liste = new Travaux();
            break;

        case 'users':
            $this->liste = new Users();
            break;

        default:
            break;
        }

    }

    abstract public function getItemById($id);
    abstract public function  getElementHtml($typeDonnees, $paramHTML);

}