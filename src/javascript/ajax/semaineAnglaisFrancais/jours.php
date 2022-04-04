<?php 
	$joursAnglais = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
	$joursFrancais =array('dimanche','lundi','mardi','mercredi','jeudi','vendredi','samedi');
	
        /***
         * Exceptionnellement $_REQUEST est utilisé afin de 
         * permettre les requêtes GET et les requêtes POST.
         * N'utilisez pas cette variable en mode production
         * puisqu'elle constitue une faille de sécurité en
         * acceptant les requête de toutes natures.
         */
	if (isset($_POST['langue']))
		$langue = filter_input (INPUT_POST, 'langue', FILTER_SANITIZE_SPECIAL_CHARS); //n'utilisez pas request
	else 
		$langue = "anglais";
	
	/***
         * La structure de contrôle switch est favorisée au if. 
         * Pour l'apparition de choix supplémentaires, le code 
         * serait alors plus structuré.
         */
        switch ($langue) {
            case "anglais":
                echo implode(",", $joursAnglais);
                    break;
            case "francais":
                echo implode(",", $joursFrancais).filter_input(INPUT_POST, "nom",FILTER_SANITIZE_SPECIAL_CHARS);
                break;
            default:
                break;
        }

