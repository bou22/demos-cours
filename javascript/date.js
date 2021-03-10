/* 
 * Fonctions de manipulation de date.
 */

function ajouterUnMois(stringDate){
    let date = new Date(stringDate);
    let mois = date.getMonth();
    date.setMonth(mois+1);
    
    return formaterLaDate(date);
}

function enleverUnMois(stringDate){
    let date = new Date(stringDate);
    let mois = date.getMonth();
    date.setMonth(mois-1);
    
    return formaterLaDate(date);
}

function formaterLaDate(date){
    return date.toLocaleString('fr-CA',{weekday: "long", year: "numeric", month: "long", day: "numeric"});
}
