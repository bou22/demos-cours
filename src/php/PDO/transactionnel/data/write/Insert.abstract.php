<?php
/**
 * Description de Delete
 * Modèle de suppression d'une enregistrement avec son id.
 * @author Claude
 */

require_once 'iTransaction.interface.php';

abstract class Insert implements iTransaction {
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

    protected function inserer($objet){
        try {
            $this->resultat = $this->connexion->prepare($this->requete);

            /**L'objet contient les paramètres pour le type de données de chaque colonne. */
            foreach ($objet as $key => $value) {
                $this->resultat->bindParam($key,$value[0],$value[1],$value[2]);
            }

            $resultat = $this->resultat->execute();

        } catch (Exception $e){
            error_log($e->getMessage());
        }
 
    }

}

require_once 'InsertUser.classe.php';
