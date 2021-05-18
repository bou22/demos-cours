<?php
/**
 * Classe statique.
 * Permet de vérifier la présence d'un compte pour l'authentification.
 * La classe substitue un accès à une base de données.
 */

class Authentification {
    //Vous pouvez ajouter des accès dans le tableau
    //private static $hache = file_get_contents("pwd.txt");//même chose qu'un select sur bd
    private static $utilisateur = array("guy.lafleur"=>"lafleur");

    public static function getAuthentification($user, $mdp){

        //Requête sur la Bd pour récupérer le user et le mdp.
        $hache = file_get_contents("pwd.txt");
        
        if (array_key_exists($user,self::$utilisateur)){
            //Le nom existe alors vérifier le mdp.
            
            return password_verify($mdp,$hache);
        } else {
            return FALSE;
        }
    }


}