<?php
include_once 'include.config.php';
include_once RACINE.'/logique/Abstract.Html.php';

$aleatoire = random_int(0,1); //Aléatoirement un tableau ou une liste est affichée.

if ($aleatoire===0){
    $afficheDesDonnes = new ListeHtml();
}else {
    $afficheDesDonnes = new TableauHtml();
}

echo "<h1>Valeur aléatoire: ".$aleatoire."</h1>";
// $afficheDesDonnes affiche son contenu indépendamment de la classe instanciée. 
// Full SR, OF et Liskov
echo $afficheDesDonnes->generer();

