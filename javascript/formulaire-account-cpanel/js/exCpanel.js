/* 
 * Ici sont toutes les validations dans le formulaire
 */

const modeDebug = true; //Pour afficher if(modeDebug)console.log

function facadeValidation(element){
    let nomDuChamp = element.name;
        if(modeDebug) console.log(nomDuChamp);
    
    switch (nomDuChamp){
        case "domaine":
            validerDomaine(element);
            setUtilisateur(element);//Ajout automatique du nom d'utilisateur.
            break;
        case "mdp1":
            setNiveauMdp(element);
            break;
        case "mdp2":
            validerMdpEgaux(element);
            break;
    }
    
}

/*
 * La fonction exerce une validation sur la présence d'un "." et 
 * utilise les fonctions de retrait/ajout d'un alerte.
 * @param {Element} element
 * @returns {undefined}
 */
function validerDomaine(element){
                if(modeDebug)console.log(element.value.indexOf(".")>0);
    
    if(element.value.indexOf(".")<0){
        afficherAlerte(element);
    } else {
        effacerAlerte(element); //Si l'alerte existe, elle est retiré.
    }
}

/*
 * Le nom d'utilisateur est pris dans le nom de domaine avec les 16 premier
 * caractères.
 * @param {Element} element
 * @returns {undefined}
 */
function setUtilisateur(element){
                        if(modeDebug)console.log(element.value.substring(0,15));
    //Récupération du nom de domaine inscrit.
    document.getElementsByName("utilisateur").item(0).value= element.value.substring(0,15);
}

/*
 * Selon la longueur du mot de passe, le champ niveau du formulaire  
 * reçoit une valeur entre Faible, Moyen ou Fort.
 * @param {Element} element
 * @returns {undefined}
 */
function setNiveauMdp(element){
    //Les niveaux à utiliser.
    let niveaux = ["Faible","Moyen","Fort"];
    
    //Le champ niveau du formulaire sera modifié.
    let niveau = document.getElementsByName("niveau").item(0);
    
    //Selon la longueur du mot de passe, le champ niveau reçoit une valeur.
    if (element.value.length<4){
        niveau.value = niveaux[0];
    } else if(element.value.length<9) {
        niveau.value = niveaux[1];        
    } else {
        niveau.value = niveaux[2];
    }
}


/*
 * Valide que les deux mots de passe soient égaux, sinon le deuxième champ
 * est marqué d'une alerte.
 * @param {Element} mdp2
 * @returns {undefined}
 */
function validerMdpEgaux(mdp2){
    
    //Récupération du premier mdp pour validation.
    let mdp1 = document.getElementsByName("mdp1").item(0);
    
    //Comparaison avec le 2e mdp
    if (mdp2.value !== mdp1.value){
        afficherAlerte(mdp2);
    } else {
        effacerAlerte(mdp2);
    }
}


/*
 * Le marqueur d'erreur sur la droite du champ est créé
 * de toute pièce ici.
 */
function afficherAlerte(element){
    element.setAttribute("id","focus");//Le id est temporaire pendant le traitement.
    
    let champValidé = document.getElementById(element.id);
                    if(modeDebug)console.log(champValidé);
    
    //Petite précaution, effacer l'alerte existante si elle y est déjà.
    if (document.getElementById("poureffacer") !== null){
        effacerAlerte(element);
    }
    
    //Séquence de création du nouvel élément
    let alerte = document.createElement("span");
    alerte.setAttribute("id","poureffacer");//risque présent de doublon
    alerte.style.backgroundColor="yellow";
    alerte.style.paddingLeft="10px";
    alerte.style.paddingRight="10px";
    let exclamation = document.createTextNode(" X ");
    alerte.appendChild(exclamation);
    
    //Insertion sur la droite du champ validé.
    champValidé.parentNode.insertBefore(alerte,champValidé.nextSibling);
    
    //Le id temporaire est retiré.
    champValidé.removeAttribute("id");
}

/*
 * Le marqueur d'erreur est retiré après la correction.
 */
function effacerAlerte(element){
    
    //Évidemment il faut l'enlever seulement s'il y est déjà.
    //Le id poureffacer est inscrit sur le marqueur.
    if (document.getElementById("poureffacer") !== null){

        element.setAttribute("id","focus");//Le id est temporaire pendant le traitement.
        console.log(element);
        let champValidé = document.getElementById(element.id);
                        if(modeDebug)console.log(champValidé);

        //Retrait de l'élément sur la droite du champ validé.
                        if(modeDebug)console.log(champValidé.nextSibling);
        if(champValidé.nextSibling !== null){
            champValidé.parentNode.removeChild(champValidé.nextSibling);
        }

        //Le id temporaire est retiré.
        champValidé.removeAttribute("id");
    }
}