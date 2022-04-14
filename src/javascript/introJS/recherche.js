/**
 * Fonctions de recherche de nouveau clé dans le code html/js/css d'une page web.
 * @param {*} motRechercher mot clé de recherche
 */
// 

function rechercherLeMot(motRechercher) {

    let nouveau = motRechercher.trim()
    let ancien = window.localStorage.getItem("ancien")

    if (nouveau.length>1){

        //Retrait des surlignés
        let remplacementAncien = new RegExp('<span class="surlignement">'+ancien+'<\/span>','g')

        let texteSansSpan = document.body.innerHTML.replace(remplacementAncien,ancien)
        document.body.innerHTML = texteSansSpan

        //Ajout des surlignés si le mot existe dans le noeud texte et que le mot n'est pas une balise
        if (document.body.textContent.indexOf(nouveau) != -1 
            && document.getElementsByTagName(nouveau).length == 0){
            let remplacementNouveau = new RegExp(nouveau,'g')

            let texteAvecSpan = document.body.innerHTML.replace(remplacementNouveau,'<span class="surlignement">'+nouveau+'</span>')
            document.body.innerHTML = texteAvecSpan
        }

        // console.log(ancien+"\n"+nouveau)

        window.localStorage.setItem("ancien",nouveau)

        // console.log("Remplacement ancien: " + remplacementAncien)
        // console.log("Retrait surligné: "+texteSansSpan)
        console.log("Retrait surligné: "+document.body.textContent)

    }

}
