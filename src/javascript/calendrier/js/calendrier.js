/**
 * Mise en oeuvre du calendrier.
 */
const modeDebug = true; //Pour afficher console.log().

/**
 * Pour générer le calendrier lors du onload de la page.
 * Le calendrier est généré avec la date actuelle.
 */
function genererCalendrierInitial(){
    //Cet élément va recevoir le calendrier dynamique démarré avec la date actuelle.
    let structure = document.getElementById("structureAccueil");
    
    structure.appendChild(genererCalendrier(new Date()));
    
    if (modeDebug)console.log(structure.innerHTML);
}

/**
 * Génération du calendrier pour le mois suivant/précédent.
 * @param {Date} date utilisée pour le mois à inscrire
 */
function genererCalendrierAvecDate(date){
    //Cet élément va recevoir le calendrier dynamique avec la date demandée.
    let structure = document.getElementById("structureAccueil");
    
    structure.innerHTML = ""; //Le calendrier présent est supprimé.
    
    structure.appendChild(genererCalendrier(date));    
}

/**
 * Production de calendrier au complet.
 * La structure d'accueil du calendrier dans la GUi n'est plus
 * accessible ici. 
 * @param {Date} date Date à utiliser. 
 */
function genererCalendrier(date){
    //L'entête du calendrier est générée.
    let calendrier = genererEntete(date);//Le ul est créé là.
    
    if(modeDebug)console.log(calendrier);
    
    //Compléter la partie dynamique.
    calendrier = completerLesDates(date,calendrier);

    return calendrier;
}

/**
 * Générer la partie entête du calendrier incluant le mois et année
 * et la liste des jours de la semaine.
 * @param {Date} date Date à utiliser.
 * @returns Element: Élément à inclure dans le DOM.
 */
function genererEntete(date){
    //Le calendrier est dans un ul.
    let calendrier = document.createElement("ul");
    calendrier.setAttribute("id","calendrier");
    
    let enteteMois = document.createElement("li");
    //Ajouts des flèches pour naviguer aux mois suivant/précédent
    //Le clique de la flèche reçoit une indication de créer une date
    //avec le mois  précédent ou suivant.
    enteteMois.innerHTML = "<a onclick='genererCalendrierAvecDate(new Date("+date.getFullYear()+","+ (date.getMonth()-1) +"))'> << </a> ";
    enteteMois.innerHTML += mois[date.getMonth()]+" "+date.getFullYear();
    enteteMois.innerHTML += "<a onclick='genererCalendrierAvecDate(new Date("+date.getFullYear()+","+ (date.getMonth()+1) +"))'>>></a>";
    //L'entête mois/année est ajouté dans le tableau en ul.
    calendrier.appendChild(enteteMois);

    //Ajout de l'entête qui contient les 1eres lettre de chaque journée.
    let enteteJours = document.createElement("li");
    for(let i=0;i<7;i++){
        let jour = document.createElement("span");
        jour.innerHTML = jours[i];
        enteteJours.appendChild(jour);
    }

    calendrier.appendChild(enteteJours);

    return calendrier;//À cet étape le calendrier contient slmt l'entête.
}

/**
 * 
 * @param {Date} date Date de création du calendrier
 * @param {DOM Element} calendrier Le calendrier contenant l'entête et dont
 * il faut ajouter les dates.
 * @returns calendrier: Le calendrier complété.
 */
function completerLesDates(date, calendrier){
    //Créé avec la date passée en paramètre pour l'ajout des dates.
    let premierDuMois = new Date(date); 
    //La date est reportée au 1er du  mois
    premierDuMois.setDate(1);
    
    //Une autre variable est créée et reportée au dernier du mois
    let dernierDuMois = new Date(date.getFullYear(),date.getMonth()+1,0);
    if(modeDebug){
        console.log("premier:"+premierDuMois.getDate());
        console.log("dernier:"+dernierDuMois.getDate());
        console.log(dernierDuMois.getDate()+1);
    }
        /**
         * L'algorithme est ici.
         * La boucle i parcoure les dates du mois du 1e au dernier jour.
         * La boucle j place la date dans la bonne journée de la semaine.
         */
    for(let i=premierDuMois.getDate();i < dernierDuMois.getDate()+1;i){
        let semaine = document.createElement("li");//la semaine est un li.
        for(let j=0;j<7;j++){
            let jour = document.createElement("span");//le jour est un span
            jour.setAttribute("onclick","selectDate(this)");//changement du bckground
            
            if (j === premierDuMois.getDay() && premierDuMois.getMonth() === date.getMonth()){
                //La date doit être inscrite dans la case.
                jour.innerHTML = premierDuMois.getDate();
                if(modeDebug)console.log("j:"+j+" i:"+premierDuMois.getDate());
                //La date et i sont avancés de 1.
                premierDuMois.setDate(premierDuMois.getDate()+1);
                i++;
            } else {
                //La case doit rester vide.
                if(modeDebug)console.log("vide:"+j);
                jour.innerHTML = "&nbsp;";
            }
            
            semaine.appendChild(jour);
        }
        calendrier.appendChild(semaine);//calendrier est un ul.
    }

    return calendrier;  //le calendrier est complet

}