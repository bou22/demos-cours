<?php
/**
 * Pour les inclusions
 */
set_include_path(get_include_path().PATH_SEPARATOR.__DIR__);

/**
 * Classe abstraite qui contient les données à afficher en HTML.
 */
abstract class Html 
{
    protected $donnees;
    protected $structureHtml;

    protected function setDonnees(){
        include_once 'include.config.php';
        include_once RACINE.'/donnees/Donnees.statique.php';
        error_log(RACINE.'/donnees/Donnees.statique.php');
        $this->donnees = Donnees::$donnees;
    }

    abstract public function generer();
}

include_once RACINE.'/logique/classe.ListeHtml.php';
include_once RACINE.'/logique/classe.TableauHtml.php';