<?php

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);
require_once 'write/Delete.abstract.php';
require_once 'write/Insert.abstract.php';
require_once 'read/Read.abstract.php';
require_once 'iData.interface.php';

class UsersData implements iData 
{
    private $user;
    private $users;

    public function getSelectAll(){

        $dataUsers = new ReadUsers();
        $this->users = $dataUsers->getListe();

        $retour = array();

        foreach ($this->users as $value) 
        {
            $retour[$value['id']] = $value['nom'];
        }
        return $retour;
    }

    public function supprimerById($objet) 
    {
        $this->user = new DeleteUser();

        return $this->user->execute($objet); //rowcount() suite au delete.
    }

    public function insererUnElement($objet)
    {
        $this->user = new InsertUser();

        return $this->user->execute($objet); //rowcount() suite au delete.        
    }

}