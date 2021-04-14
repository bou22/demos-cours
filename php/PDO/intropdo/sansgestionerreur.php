<?php
/**
 * Attention !
 * Ce script réalise une connexion sur un serveur de base de données.
 * La séquence classique de connexion et de requêtes y apparait, mais dans
 * cet état le script n'est pas utilisable pour une application backend. La sécurité
 * n'est pas gérée adéquatement et il devrait y avoir une structure de programmation
 * adéquate.
 */

    $utilisateur = "le utilisateur";
    $mdp = "le mot de passe";
    $chaineConnexion = "mysql:dbname=nomDuSchema;host=127.0.0.1";

    //L'instanciation d'ene variable en pdo
    // https://www.php.net/manual/fr/class.pdo.php
    $maConnexionPDO = new PDO($chaineConnexion,$utilisateur,$mdp);

    //La requête est préparée avec insertion d'une variable.
    //$pdoRequete est du type PDOStatement.
    // https://www.php.net/manual/fr/class.pdostatement.php
    $pdoRequete = $maConnexionPDO->prepare("select * from fleurs where id=:id");
    
    //Une valeur est attribuée à la variable. 
    $id = 3;
    $pdoRequete->bindParam(":id",$id,PDO::PARAM_INT);

    //La requête complétée, avec une valeur sur la variable, est passée au
    // serveur de bd, sur le schéma.
    $pdoRequete->execute();

    // Récupération du contenu des enregistrements
    // https://www.php.net/manual/fr/pdostatement.fetchobject.php
    // fetchObject donne l'enregistrement comme un objet dont les 
    // variables de classe, les colonnes de la table questionnée,
    // sont des attributs publics.
    $enregistrements = $pdoRequete->fetchObject();

    //Dans ce cas-ci le résultat est affiché.
    header("Location: info.php?message=Hoo là là ça marche pas.");


?>