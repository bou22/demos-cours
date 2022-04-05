<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'read/Liste.abstract.php';

class Users {
    private $id;
    private $nom;
    private $users;

    public function __construct()
    {
        $dataUsers = new ListeUsers();
        $this->users = $dataUsers->getListe();
    
    }

    public function getSelectAll(){
        $retour = array();

        foreach ($this->users as $value) {
            $retour[$value['id']] = $value['nom'];
        }
        return $retour;
    }

}