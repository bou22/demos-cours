<?php

/** Les infos sont inscrites dans la bd. */
$donneesRequeteOk = true; //Sera changé en false si les données sont invalides.

if (!empty($_POST['nom'])){
    $nom = filter_input(INPUT_POST, "nom",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $donneesRequeteOk = false;
}

if (!empty($_POST['mdp'])){
    $mdp = filter_input(INPUT_POST, "mdp",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $donneesRequeteOk = false;
}

if ($donneesRequeteOk){

    $objet = new stdClass();
    $objet->nom = $nom;
    $objet->mdp = password_hash($mdp, PASSWORD_DEFAULT);

    require_once '../data/Users.classe.php';
    $user = new Users();
    
    if ($user->insererUnElement($objet)){
        header("Location: ../index.php?requete=ok");
    } else {
        header("Location: ../erreurs.php?erreur=insert-erreur");
    }
 
} else {
    header("Location: ../erreurs.php?erreur=formInvalide");
}
