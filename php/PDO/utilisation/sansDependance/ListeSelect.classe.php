<?php
require_once './connexion/ConnexionPDO.classe.php';
require_once 'ListeFleurs.classe.php';
require_once 'ListeTravaux.classe.php';

/**
 * Classe de récupération de la connexion sur une base de données.
 * @author Claude
 */
class ListeSelect {

    protected $liste;

    public function __construct()
    {
        // $this->listeFleurs = new ListeFleurs();
        // $this->listeTravaux = new ListeTravaux();
    }

    /**
     * Fourni une liste en HTML dropdown.
     */
    public function getElementHtml($typeDonnees, $paramHTML){

        switch ($typeDonnees) {
            case 'fleurs':
                $this->liste = new ListeFleurs();
                break;
            
        case 'travaux':
            $this->liste = new ListeTravaux();
            break;

        default:
            break;
        }
        
        $liste = $this->liste->getListe();

        $html = "<select ".$paramHTML.">";
        foreach($liste as $key=>$value){
            $html .= "<option value='".$key."'>".$value."</option>";
        }
        $html .= "</select>";

        return $html;
    }

    public function getItemById($id)
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