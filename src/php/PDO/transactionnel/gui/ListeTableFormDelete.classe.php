<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'data/FleurData.classe.php';
require_once 'data/TacheData.classe.php';
require_once 'data/UsersData.classe.php';
require_once 'ElementHtml.abstract.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeTableFormDelete extends ElementHtml {

    protected $liste;

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getElementHtml($typeDonnees, $paramHTML){

        $this->setListeElement($typeDonnees);
        
        $html = "<table ".$paramHTML.">";
        foreach($this->liste->getSelectAll() as $key=>$value){
            $html .= "<tr><td>$key</td><td>$value</td><td><form id='f$key' action='redirect/supprimerUser.redirect.php' method='get'><input type='hidden' name='iduser' value='$key'><input type='submit' value='X'></td></form></tr>";
        }
        $html .= "</table>";

        return $html;
    }

    public function getItemById($id)
    {
        // à faire
    }

}