<?php
/** Puisqu'il n'y a pas de bd, des valeurs statiques sont utilisées. */
$donneesRequeteOk = true; //Sera changé en false si une des données est invalide.
$nomUsager = "joe";
$password = password_hash("blo",PASSWORD_DEFAULT);

if (!empty($_POST['user']) && $_POST['user'] === $nomUsager){
    $user = filter_input(INPUT_GET, "user",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    setcookie('user',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

if (!empty($_POST['mdp']) && password_verify($_POST['mdp'],$password)){
    $mdp = filter_input(INPUT_GET, "mdp",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    setcookie('user',"0", time()+30,"/");
    $donneesRequeteOk = false;
}

switch ($donneesRequeteOk) {
    case true:
        error_log("------------------------------------------------------------------");
        include_once '../include.config.php';
        include_once RACINE.'/logique/include.session.php';
        creerAuthentification();
        header("Location: ../zone/confidentielle.php"); //vers la session
        break;
    
    default:
    header("Location: ../index.php"); //vers une nouvelle essaie
        break;
}
