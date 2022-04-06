<?php

if (!empty($_GET['iduser']) && filter_input(INPUT_GET,"iduser",FILTER_VALIDATE_INT)){

    require_once '../data/Users.classe.php';
    $id = filter_input(INPUT_GET,"iduser",FILTER_SANITIZE_NUMBER_INT);

    $objet = new stdClass();
    $objet->id = $id;

    $user = new Users();

    if ($user->supprimerById($objet)){
        header("Location: ../index.php?requete=1");
    } else {
        header("Location: ../erreurs.php?erreur=delete-erreur");
    }
    
} else {
    header("Location: ../erreurs.php?erreur=formInvalide");
}
