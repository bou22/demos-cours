<?php
/**
 * Classe statique.
 * Permet de vérifier la présence d'un compte pour l'authentification.
 * La classe substitue un accès à une base de données.
 */

class Authentification {
    //Vous pouvez ajouter des accès dans le tableau
    private static $utilisateur = array("guy.lafleur"=>"soleil123");

    public static function getAuthentification($user, $mdp){
        if (array_key_exists($user,self::$utilisateur)){
            //Le nom existe alors vérifier le mdp.
            return (self::$utilisateur["$user"]===$mdp);
        } else {
            return FALSE;
        }
    }


}