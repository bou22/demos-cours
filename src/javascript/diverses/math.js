/* 
 * Fonction d'utilisation de l'objet Math.
 */


function arrondir(formulaire){
    //Le paramètre de la fonction est un formulaire qui prend la valeur passée lors
    //de l'appel dans le fichier math.html.
    console.log("Formulaire: "+formulaire.name);
    console.log("Element0: "+formulaire.elements[0].name);
    console.log("Element2: "+formulaire.elements[2].name);
    
    return Math.round(formulaire.elements[0].value);
}