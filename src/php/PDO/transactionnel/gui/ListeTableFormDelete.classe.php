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
class ListeTableFormDelete extends ElementHtml {

    protected $liste;

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getElementHtml($typeDonnees, $paramHTML){

        $this->setListeElement($typeDonnees);
        
        $html = "<table ".$paramHTML.">";
        foreach($this->liste->getSelectAll() as $key=>$value){
            $html .= "<tr><form id='f$key' action='redirect/supprimerUser.redirect.php' method='get'><td><input type='text' name='iduser' value='$key'></td><td><input type='text' name='nomuser' value='$value'></td><td><input type='submit' value='X'></td></form></tr>";
        }
        $html .= "</table>";

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