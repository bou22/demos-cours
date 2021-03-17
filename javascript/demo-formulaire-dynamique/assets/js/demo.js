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
    
    let nouveauDiv = document.createElement("div");
    nouveauDiv.setAttribute("class","col-6 col-12-mobilep");
    let input = document.createElement("input");
    input.setAttribute("type","email");
    input.setAttribute("name","email");
    input.setAttribute("id","email");
    input.setAttribute("placeholder","Courriel");
    nouveauDiv.appendChild(input);
    
    parent.insertBefore(nouveauDiv,petitFrere);
}

function activerLeBouton(){
    let bouton = document.getElementById("boutonSubmit");
    bouton.removeAttribute("disabled");
}

