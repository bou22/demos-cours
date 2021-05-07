<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurData
 *
 * @author Claude
 */

require_once './html/ProvincesDropdown.classe.php';
require_once './html/UtilisateursDropdown.classe.php';

class ControleurHTML {
    
    public static function getProvincesDropDown() {
        $classe = new ProvincesDropdown();
        return $classe->getHTML();
    }
    
    public static function getUtilisateursDropDown() {
        $classe = new UtilisateursDropdown();
        return $classe->getHTML();
    }    
}

