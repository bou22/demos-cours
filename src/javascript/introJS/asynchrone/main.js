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
            let d = await delaiDeRecherche(valeur,index)
            // let d = await delaiNonRespecte(valeur,index)

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
 * Cette fonction peut représenter un attente réseau lors de
 * l'appel à une requête http (fetch).
 */
function delaiDeRecherche(valeur,index) {

    let delai = Math.trunc(Math.random()*10000)

    return new Promise((resolve,reject) => {
        setTimeout(() => {
            if (delai > 8000){
                reject(`${index} : ${valeur} : Délai expiré`)
            } else {
                resolve(`${index} : ${new Recherche().trouver(valeur)} : ${delai}`);
            }
          
        }, delai);
      });
}


/** Le délai n'est pas respecté et l'exécution échoue */
function delaiNonRespecte(valeur,index) {

    let delai = Math.trunc(Math.random()*10000)
    let recherche = `${index} : ${valeur} : Délai expiré`

    setTimeout(() => {
        if (delai < 8000){
            recherche = `${index} : ${new Recherche().trouver(valeur)} : ${delai}`
        }
        
    }, delai);

    return  recherche
}