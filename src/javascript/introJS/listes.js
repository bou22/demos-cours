/**
 * Les fonctions utilisées pour les démos sur les bouches et array
 * Une fonction qui génère une liste UL avec du contenu itéré.
*/
const jours = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

function listeUL(liste) {
    let tableauHTML = new String("<ul>");
    for (let index = 0; index < liste.length; index++) {
        console.log(liste[index]);
        tableauHTML += "<li>"+liste[index]+"</li>";
    }
    tableauHTML += "<ul>";

    return tableauHTML;
}