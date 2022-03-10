<?php
//  Exercice: utiliser les bons filtres de nettoyages et/ou de validations.
// Le résultat des validations doit être affiché dans resultat-validation.php


session_start();

// Cette logique est pour fin de démonstration et repose sur une exigence que 
// tous les champs du formulaire soient valides et obligatoires.

$donneesRequeteOk = true; //Sera changé en false si une des données est invalide.

if (filter_input(INPUT_GET, "entier",FILTER_VALIDATE_INT)){
    $_SESSION['entier'] = filter_input(INPUT_GET, "entier",FILTER_SANITIZE_NUMBER_INT);
} else {
    setcookie('entier',"0", time()+30,"/");
    $donneesRequeteOk = false;
}


if (filter_input(INPUT_GET, "float", FILTER_VALIDATE_FLOAT)){
    $_SESSION['float'] = filter_input(INPUT_GET, "float",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
} else {
    setcookie('float',"0", time()+30,"/");
    $donneesRequeteOk = false;
}


if (filter_input(INPUT_GET, "courriel", FILTER_VALIDATE_EMAIL)){
    $_SESSION['courriel'] = filter_input(INPUT_GET, "courriel",FILTER_SANITIZE_EMAIL);
} else {
    setcookie('courriel',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

if (filter_input(INPUT_GET, "url", FILTER_VALIDATE_URL)){
    $_SESSION['url'] = filter_input(INPUT_GET, "url",FILTER_SANITIZE_URL);
} else {
    setcookie('url',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

if (!empty($_GET['user'])){
    $_SESSION['user'] = filter_input(INPUT_GET, "user",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    setcookie('user',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

if (!empty($_GET['mdp'])){
    $_SESSION['mdp'] = filter_input(INPUT_GET, "mdp",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    setcookie('mdp',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

switch ($donneesRequeteOk) {
    case true:
        header("Location: ../resultat-validation.php"); //tout est ok continuer
        break;
    
    default:
    header("Location: ../validation-formulaire.php"); //Problème recommencer
        break;
}
