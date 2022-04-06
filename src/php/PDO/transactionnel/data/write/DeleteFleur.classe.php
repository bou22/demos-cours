<?php
require_once 'Delete.abstract.php';
require_once 'connexion/ConnexionPDO.classe.php';

/**
 * Suppression d'un user par le id.
 * @author Claude
 */
class DeleteFleur extends Delete {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Réglage de la requête.
     */
    public function execute($id){
        try {
            $this->setRequete("delete from fleurs where id=:id");
            $this->deleteById($id);
            return $this->resultat->rowCount(); 

        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }

}