<?php

/*
 * Définition d'une classe en PHP
 */

/**
 * Description de Demo
 * La classe contient un variable protégée et un constructeur.
 *  Fichier: Demo.classe.php
 * @author Claude
 */
class Demo {
    private $titre;
    private $sujet;
    
    public function __construct($titre,$sujet) {
        $this->titre=$titre;
        $this->sujet=$sujet;
    }
    
    public function getTitre() {
        return $this->titre;
    }
    
    public function getSujet() {
        return $this->sujet;
    }
}
