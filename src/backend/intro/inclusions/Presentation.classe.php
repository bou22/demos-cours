<?php

include "./constante.include.php";

/*
 * Définition d'une classe en PHP
 */

/**
 * Description de Demo
 * La classe contient un variable protégée et un constructeur.
 *  Fichier: Demo.classe.php
 * @author Claude
 */
class Presentation {
    //Variables de classes
    private $titre;
    private $sujet;
    
    //Constructeur
    public function __construct($titre,$sujet) {
        $this->titre=$titre;
        $this->sujet=$sujet;
    }
    
    /**
     * Accesseur du titre.
     */
    public function getTitre() {
        return $this->titre;
    }
    
    /**
     * Accesseur du sujet.
     */
    public function getSujet() {
        return $this->sujet;
    }
}
