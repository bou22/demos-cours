<?php
//  Exercice: utiliser les bons filtres de nettoyages et/ou de validations.
// Le résultat des validations doit être affiché dans resultat-validation.php


session_start();

if (filter_input(INPUT_GET, "entier",FILTER_VALIDATE_INT)){
    $_SESSION['entier'] = filter_input(INPUT_GET, "entier",FILTER_SANITIZE_NUMBER_INT);
} else {
    $_SESSION['entier'] = "invalide";
}


if (filter_input(INPUT_GET, "float", FILTER_VALIDATE_FLOAT)){
    $_SESSION['float'] = filter_input(INPUT_GET, "float",FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
} else {
    $_SESSION['float'] = "invalide";
}


if (filter_input(INPUT_GET, "courriel", FILTER_VALIDATE_EMAIL)){
    $_SESSION['courriel'] = filter_input(INPUT_GET, "courriel",FILTER_SANITIZE_EMAIL);
} else {
    $_SESSION['courriel'] = "invalide";
}

if (filter_input(INPUT_GET, "url", FILTER_VALIDATE_URL)){
    $_SESSION['url'] = filter_input(INPUT_GET, "url",FILTER_SANITIZE_URL);
} else {
    $_SESSION['url'] = "invalide";
}

if (!empty($_GET['user'])){
    $_SESSION['user'] = filter_input(INPUT_GET, "user",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $_SESSION['url'] = "invalide";
}

if (!empty($_GET['mdp'])){
    $_SESSION['mdp'] = filter_input(INPUT_GET, "mdp",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $_SESSION['mdp'] = "invalide";
}

header("Location: ../resultat-validation.php");