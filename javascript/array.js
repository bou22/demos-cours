/* 
 * Fonctions de manipulation du type Array.
*/

function extraireLeContenu(tableau){
    //console.clear();
    let noms = "";
    for (let i of tableau){
        console.log(i);
        noms += i+"\n"; //L'élément et un saut de ligne.
    }
    
    return noms;
}

function extraireLesIndex(tableau){
    //console.clear();
    let index = "";
    for (let i in tableau){
        console.log(i);
        index += i+"\n"; //L'élément et un saut de ligne.
    }
    
    return index;
}

function ajouterLeNom(tableau, nom){
    tableau.push(nom);
    extraireLesIndex(tableau); //Pour afficher la console.
    extraireLeContenu(tableau); //Idem
    
    return tableau;
}