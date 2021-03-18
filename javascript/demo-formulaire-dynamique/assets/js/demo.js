/* 
 * Modification du formulaire de prise de rendez-vous.
 */

/*
 * Insertion du champ texte lorsque la case à cocher est coché.
 * <div class="col-6 col-12-mobilep">
 * <input type="email" name="email" id="email" value="" placeholder="Email" />
 * </div>
 */
function setInputEmail(element){
    let caseCocher = element;
    let petitFrere = caseCocher.parentNode.nextSibling; //Le voisin du parent
    let parent = petitFrere.parentNode;
    
    //Les nouveaux div et input sont préparés et seront soit 
    //ajoutés ou retirés de la structure selon l'état de la case à cocher.
    let nouveauDiv = document.createElement("div");
    nouveauDiv.setAttribute("class","col-6 col-12-mobilep");
    nouveauDiv.setAttribute("id","divEmail")
    let nouveauInput = document.createElement("input");
    nouveauInput.setAttribute("type","email");
    nouveauInput.setAttribute("name","email");
    nouveauInput.setAttribute("id","email");
    nouveauInput.setAttribute("placeholder","Courriel");
    nouveauDiv.appendChild(nouveauInput);    
    
    //Si le noeud n'existe pas et que la case a été cochée.
    if (document.getElementById("email")== null && element.checked){
        parent.insertBefore(nouveauDiv,petitFrere);
    //Si la case est décochée.
    } else if (!element.checked){
        parent.removeChild(document.getElementById("divEmail"));
    }
}

/*
 * Le onchange de la case à cocher ajouter ou retire la désactivation
 * du bouton.
 */
function activerLeBouton(){
    let bouton = document.getElementById("boutonSubmit");
    
    //Si l'attribut est à true, il est retiré.
    if (bouton.hasAttribute("disabled")){
        bouton.removeAttribute("disabled");
    } else {
        //S'il est à false il est ajouté.
        bouton.setAttribute("disabled", "true");
    }
    
}

