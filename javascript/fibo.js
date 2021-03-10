
/**
 * Produit dans la console une suite de Fibo jusqu'à n.
 * @param {Entier: valeur maximale} n 
 */
function fibo (n){
    if (n==0){
        console.log(n);
    } 
    else {
        let v1=0;
        let v2=1;
        let v3;
        console.log(v1);
        
        while (v2 <= n){
            console.log(v2);
            let v=v2;
            v2 = v1+v2;
            v1=v;
        }
    }
    
}
/**
 * Une suite de Fibo est générée jusqu'à la valeur maximale n.
 * 
 * Note: La fonction devrait être améliorée, #1 en utilisant la récursivité
 * et #2 en utilisant une fonction fibo() qui retournerait une structure de donnée
 * contenant la suite de Fibo produite.
 * 
 * @param {Entier: valeur maximale} n 
 * @returns Le code html de la liste OL.
 */
function fiboGui(n){
    let codeListeOl= "<ol>"; //Contiendra la liste 
    
    if (n==0){
        codeListeOl += n;
    } 
    else {
        let v1=0;
        let v2=1;
        let v3;
        codeListeOl += "<li>"+v1+"</li>";

        while (v2 <= n){
            codeListeOl += "<li>"+v2+"</li>";
            let v=v2;
            v2 = v1+v2;
            v1=v;
        }
    }
    codeListeOl += "</ol>";

    return codeListeOl;
}

/**
 * La fonction montre l'utilisation du DOM niveau 1 afin d'accéder 
 * à un champ de formulaire.
 * 
 * La forme de cette fonction est une démonstration et est incomplète puisque 
 * l'utilisation du DOM  * ne met pas en usage la valeur récupéré.
 * 
 * @param {Entier: valeur maximum de la suite.} max 
 * @returns 
 */
function fiboDom(max){
    //f1 = objet formulaire ; valeurMax = objet input
    console.log(window.document.f1.valeurMax.value);
    //forms = tableau des formulaires ; elements = tableau des éléments dans le formulaire
    console.log(window.document.forms[0].elements[0].value);
    
    //La valeur du champ texte est accessible en lecture/écriture.
    //window.document.f1.valeurMax.value = 200;

    return fiboGui(max);
    
}