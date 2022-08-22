<?php
/**
 * Description de Delete
 * Modèle de suppression d'une enregistrement avec son id.
 * @author Claude
 */

require_once 'iTransaction.interface.php';

abstract class Delete implements iTransaction {
    protected $connexion;
    protected $requete;
    protected $resultat;
    
    /**Fonction abstraite à implémenter */
    abstract public function execute($objet);

    public function __construct()
    {
        try {
            $cd = new ConnexionPDO();
            $this->connexion = $cd->getConnexion();
        } catch (Exception $e){
            error_log($e->getMessage());
        }

    }

    protected function setRequete($requete){
        $this->requete = $requete;
    }

    protected function deleteById($objet){
        try {
            $this->resultat = $this->connexion->prepare($this->requete);
            $this->resultat->bindParam(":id",$objet->id,PDO::PARAM_INT,16);
            $resultat = $this->resultat->execute();

        } catch (Exception $e){
            error_log($e->getMessage());
        }
 
    }

}

require_once 'DeleteUser.classe.php';
