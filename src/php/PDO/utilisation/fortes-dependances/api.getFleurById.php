<?php
    //Cet exemple utilise un namespace: namespace bdPrintemps; dans le dossier ./connexion

    include_once './ListeFleursJSON.classe.php';
    $liste = new ListeFleursJSON();

    header('Content-Type: application/json');
    echo $liste->getFleurById(1);
?>