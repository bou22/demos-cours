<?php
/**
 * Description de ListeFleurs
 * Classe de récupération des noms de fleurs sur une bd.
 * @author Claude
 */

abstract class Liste {
    protected $liste;
    protected $connexion;
    protected $requete;
    
    abstract public function getListe();
    abstract public function getItemById($id);

    public function __construct()
    {
        $cd = new ConnexionPDO();
        $this->connexion = $cd->getConnexion();
    }
    
    protected function selectToutes()
    {
        try {
            $this->liste = $this->connexion->prepare($this->requete);
    
            //La requête complétée, avec une valeur sur la variable, est passée au
            // serveur de bd, sur le schéma.
            $this->liste->execute();

        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }


    protected function selectById($id)
    {
        try {
            $this->liste = $this->connexion->prepare($this->requete);

            $this->liste->bindParam(":id",$id,PDO::PARAM_INT);
    
            //La requête complétée, avec une valeur sur la variable, est passée au
            // serveur de bd, sur le schéma.
            $this->liste->execute();

        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }

    protected function setRequete($requete){
        $this->requete = $requete;
    }
}

require_once 'ListeFleurs.classe.php';
require_once 'ListeTravaux.classe.php';
require_once 'ListeUsers.classe.php';