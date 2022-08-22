/**
 * Démonstration des principales options sur les fonctions Javascript
 */



/** La fonction fléchée est utilisée dans le parcours de jours avec map */
const jours = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
const joursM = jours.map(j => j.toUpperCase());


/** C'est la fonction de tête qui est appellée de l'événement de l'interface graphique
 *  Cette fonction appelle les autres fcts pour la démonstration
 */
function execute(balise) {
    contenu(balise,texte1);
    contenu(balise,texte2);
    retour(balise,"FLÉCHÉE");
    console.log((t => "Texte: " + t)(balise.innerText));
    convertirEnBold('alpha','bravo','charlie')
}

/** Déclaration classique d'une fonction dont le 2e paramètre est une fonction anonyme */
function contenu(balise,fonction) {
    fonction(balise.innerText);
    
}

/** Déclaration d'une fonction fléchée */
let retour = (b, t) => {console.log(t + ": "+ b.innerText);}


/** Paramètres en nombre indéfini. Le paramètre est traité comme un tableau
 * console.log utilise ici l'intégration d'un gabarit ${}
 * L'utilisation de l'accent grave(`) est prescrit pour définir la chaîne de caractères
 */
function convertirEnBold(...params) {
    params.forEach(element => console.log(`<b>${element}</b>`))
}


/** Fonctions qui seront invoquées de façons anonyme */
function texte1(t) {
    console.log("TEXTE1: "+t);
}

function texte2(t) {
    console.log("TEXTE2: "+t);
}
