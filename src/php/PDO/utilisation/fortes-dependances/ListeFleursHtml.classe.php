<?php

require_once 'ListeFleurs.abstract.php';
require_once '../connexion/ConnexionPDO.classe.php';

use bdPrintemps\ConnexionPDO;

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeFleursHtml extends ListeFleurs {

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

        // **** Ici la dépendance à la Gui est forte: une classe css est hardcodé dans le code.
        $html = "<select name='fleurs' class='selectFormatGrand'>";
        while($fleur = $this->liste->fetch(PDO::FETCH_OBJ)){
            $html .= "<option value='".$fleur->id."'>".$fleur->nom."</option>";
        }
        $html .= "</select>";

        return $html;
    }

    public function getFleurById($id)
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