<?php
    include_once 'include.config.php';

    //Automatiser la lecture sera efficace.
    $erreursRecues = array();

    if (isset($_COOKIE)){
        foreach ($_COOKIE as $key => $value) {
            //La valeur du cookie est déterminé; aucune autre valeur que 0 est acceptable.
            if ($value === "0"){
                $erreursRecues[$key] = 0; //Chaque cookie est ajouté
                setcookie($key,"",0,"/"); //Le cookie est détruit
            }
        }
    }

