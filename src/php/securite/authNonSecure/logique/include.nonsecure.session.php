<?php

function authentificationValide(){
    session_start();
    return (!empty($_SESSION['valide']) && $_SESSION['valide'] == "valide");
}

function creerAuthentification(){
    session_start();
    $_SESSION['valide'] = "valide";
}

function supprimerSession() {
    session_start();
    session_gc(); //Enclencher le garbage collector lors de la fin complète.
    session_destroy();
    $_SESSION = array();
    session_commit();
}
