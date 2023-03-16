<?php
/**
 * Démonstration de la mécanique de permission/refus d'accès à une page à l'aide d'une session.
 */

//Authentification très très simplifiée
//Le nom d'usager et le mot de passe sont bons.
if(false){
    session_start();

    $_SESSION['user'] = "Guy Lafleur"; //Ce serait la valeur reçue du formulaire et validée évidemment.
    
    header("Location: pasaccessible.php");
} else {
    //Pas le droit d'entrée, on est rejetés.
    setcookie("erreur","Nous sommes tous rejetés");
    header("Location: accessible.php");
}

