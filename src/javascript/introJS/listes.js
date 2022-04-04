// Les fonctions utilisées pour les démos sur les bouches et array

const jours = new Array("Dimance", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

function listeUL(liste) {
    let tableauHTML = new String("<ul>");
    for (let index = 0; index < liste.length; index++) {
        console.log(liste[index]);
        tableauHTML += "<li>"+liste[index]+"</li>";
    }
    tableauHTML += "<ul>";

    return tableauHTML;
}