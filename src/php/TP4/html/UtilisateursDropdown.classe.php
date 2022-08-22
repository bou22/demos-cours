<?php
require_once './data/ControleurData.static.php';
require_once './html/GetCodeHTML.abstract.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class UtilisateursDropdown extends GetCodeHTML {

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getHTML(){
        $this->data = json_decode(ControleurData::selectUtilisateurs(),false);//retourné en objet

        $html = "<select name='provinces'>";
        foreach ($this->data as $data) {
            $html .= "<option value='".$data->idutilisateur."'>".$data->nomComplet."</option>";
        }
        $html .= "</select>";

        return $html;
    }

}