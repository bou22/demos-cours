<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'data/Fleur.classe.php';
require_once 'data/Travaux.classe.php';
require_once 'data/Users.classe.php';
require_once 'ElementHtml.abstract.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeSelect {

    protected $liste;

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getElementHtml($typeDonnees, $paramHTML){

        $this->setListeElement($typeDonnees);
        
        $html = "<select ".$paramHTML.">";
        foreach($this->liste->getSelectAll() as $key=>$value){
            $html .= "<option value='".$key."'>".$value."</option>";
        }
        $html .= "</select>";

        return $html;
    }

    public function getItemById($id)
    {
        $this->selectByid($id);
        $fleur = $this->liste->fetchObject();

        // Ici aussi il y a une dépendance : le paragraphe est imposé par le code. 
        $html  = "<p>";
        $html .= $fleur->nom;
        $html .= "</p>";

        return $html;
    }

}