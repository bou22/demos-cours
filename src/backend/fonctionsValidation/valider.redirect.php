<?php

    if (isset($_POST['nom'])){
        $nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $nom = "erreur";
    }
    
 
    if (empty($nom)){
        echo "La variable est vide";
    } else {
        echo "NOM: ".$nom;
    }
    