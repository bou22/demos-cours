<?php
require_once './ConnexionPDO.classe.php';

/**
 * Description de ListeFleurs
 * Classe de récupération des noms de fleurs sur une bd.
 * @author Claude
 */
abstract class ListeFleurs {
    protected $liste;
    protected $connexion;
    
    abstract public function getListe();
    abstract public function getFleurById($id);

    protected function selectToutes()
    {
        try {
            $this->liste = $this->connexion->prepare("select * from fleurs");
    
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
            $this->liste = $this->connexion->prepare("select * from fleurs where id=:id");

            $this->liste->bindParam(":id",$id,PDO::PARAM_INT);
    
            //La requête complétée, avec une valeur sur la variable, est passée au
            // serveur de bd, sur le schéma.
            $this->liste->execute();

        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}