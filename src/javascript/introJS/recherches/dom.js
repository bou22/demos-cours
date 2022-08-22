/**
 * Utilisation de la structure du DOM pour accéder à des éléments HTML
 * Les fonctions manipule le contenu statique avec diverses modifications
*/

function contenuElement(noeud) {
    alert(noeud.textContent)
    alert(noeud.innerHTML)
    alert(noeud.outerHTML)
}

function modifierContenuElement(noeud,contenu) {
    noeud.innerHTML = contenu
}

function recupererAvecId(id) {
    let elementHTML = window.document.getElementById(id)
    elementHTML.textContent = "Texte de remplacement"
}

function parcourirSesSemblables(noeud) {
    let listeElements = document.getElementsByTagName(noeud.tagName)
    console.log(listeElements)
    for (let index = 0; index < listeElements.length; index++) {
        listeElements[index].textContent = "Nouveau texte "+ index
        setOnClick(listeElements[index])
    }
}

function setOnClick(element) {
    element.setAttribute("onclick","alert(this.textContent)")
}