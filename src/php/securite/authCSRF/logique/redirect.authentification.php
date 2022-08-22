<?php
/** Puisqu'il n'y a pas de bd, des valeurs statiques sont utilisées. */
$donneesRequeteOk = true; //Sera changé en false si une des données est invalide.


include_once '../include.config.php';
include_once RACINE.'/logique/include.session.php';

if (!empty($_POST['user']) && strlen($_POST['user']) > 3){

    $user = filter_input(INPUT_POST, "user",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
        /** Pour la production, la journalisation doit se faire dans le dossier logs du serveur. */
        file_put_contents("../zone/erreurs-access.log","[".$_SERVER['REMOTE_ADDR']."]  ".date("d F Y")."  Authentification échoué. - ".$_SERVER['REMOTE_PORT']." - ".$_SERVER['REQUEST_URI']." - ".date("H:i:s")."\n",FILE_APPEND);
        header("Location: ../index.php"); //vers une nouvelle essaie
        break;
}
