<?php

if (!isset($_POST['nom'],$_POST['mdp'])){
    //Le formulaire ne contient pas ces champs.
    //Ceci peut arriver en cas d'attaque.
    //Une info d'entête de réponse est envoyée: elle indique 
    //au navigateur de faire une redirection sur le lien fourni.
    header("Location: index.php");
} else if (empty($_POST['nom']) || empty($_POST['mdp'])){
    //Les champs sont obligatoires dans le formulaire.
    //Il faut valider sur le backend aussi.
    header("Location: index.php");
} else {
    //Toutes les exigences sont atteintes, on peut vérifier 
    //l'authentification.

    require_once './Authentification.static.php';

    //Les valeurs provenant de l'extérieur du serveur doivent
    //être considérées dangereuses et être alors soit filtrées ou validées.
    $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);
    $mdp = filter_input(INPUT_POST,'mdp',FILTER_DEFAULT);

    //Utilisation de la classe statique pour substituer une Bd.
    if (Authentification::getAuthentification($nom,$mdp)){
        //Nom et mdp ok
        header("Location: zoneauthok.php");
    } else {
        header("Location: index.php");
    }
}
