/** Cette fonction réalise 10 recherches avec chacune
 * un délai aléatoire entre 0 et 10 secondes.
 * Chaque itération de la boucle attend le retour de la fonction
 * avec le délai (resolve).
 * Lorsque le délai est supérieur à 8sec. la fct retourne
 * une erreur (reject).
 */
async function rechercherLeMot(valeur){

    for (let index = 0; index < 10; index++) {
        try{
            let d = await recherche(valeur,index)
            // let d = delaiNonRespecte(valeur,index)

            let divMain = document.getElementById("main")
            let resultat = document.createElement('p')
            resultat.innerText = d
            divMain.appendChild(resultat)

        } catch(erreur){
            console.log(erreur)
        }
    }
}

/** Une fonction qui retourne une promesse de résolution lorsque
 * le délai sera atteint.
 * 
 * Cette fonction utilise l'appel à une requête http (fetch) dans la classe Recherche.
 */
async function recherche(valeur,index) {
    let resultat = await new Recherche().trouver(valeur)
    return `${index} : ${resultat}`
}

/** L'utilisation ne respecte pas le délai d'exécution de fetch */
function delaiNonRespecte(valeur,index) {

    let resultat = new Recherche().trouver(valeur)
    return `${index} : ${resultat}`
}