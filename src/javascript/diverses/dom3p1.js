/* 
 *Utilisation de l'APi DOM niveau 3
 *
 */

function utiliserDom(){

    /*
     * getElementsByTagName retourne un tableau des noeuds.
     * https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementsByTagName
     */
    // Un seule élément body.
    let parent = document.getElementsByTagName("body").item(0);
    console.log(parent.tagName);
    
    //Plusieurs éléments p.
    let paragraphes = document.getElementsByTagName("p");
    console.log(paragraphes.length);
    let dernierP = paragraphes.item(paragraphes.length-2);
    console.log(dernierP.innerHTML);
    
    /*
     * getElementById ne peut retourner qu'un élément. Id est unique.
     * https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementById
     */
    let form = document.getElementById("f1");
    console.log("Form.name: "+form.name);
    
    /*
     * Ajout d'un élément dans la structure
     */
    let nouveauInput = document.createElement("input");
    nouveauInput.setAttribute("type","text");
    console.log(nouveauInput.name);
    nouveauInput.setAttribute("name","t2");
    console.log(nouveauInput.name);
    form.appendChild(nouveauInput);


    let nouveauParagraphe = document.createElement("p");
    let texte = document.createTextNode("Nouveau paragraphe");
    nouveauParagraphe.appendChild(texte);
    
    /***
     * Le noeud est une élément unique. S'il est réaffecté commen enfant
     * d'un parent différent, il est déplacé dans l'IPM (GUI).
     */
    parent.appendChild(nouveauParagraphe);
    
    parent.insertBefore(nouveauParagraphe,form);
    
    parent.appendChild(nouveauParagraphe);
    
    /*
     * Le noeud parent est utilisable avec parentNode.
     * https://developer.mozilla.org/fr/docs/Web/API/Node/parentNode
     */
    
    let noeud1 = document.getElementById("t1");
    console.log("Noeud parent: "+noeud1.parentNode.name);

}
