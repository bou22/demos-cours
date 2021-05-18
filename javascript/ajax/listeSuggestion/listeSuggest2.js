// Fonction de requétes asynchrones

function requeteAsynchrone(motClef) {
	var url = 'liste.xml'; // Prédéfini et changé ici
	var httpRequest = false;

	if (window.XMLHttpRequest) { // Mozilla, Safari,...
		httpRequest = new XMLHttpRequest();
		if (httpRequest.overrideMimeType) {
			httpRequest.overrideMimeType('text/xml');
			// Pour éviter l'erreur du serveur
		}
	} else {
		httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }   
//	Rétrocompatibilité
//	 else if (window.ActiveXObject) { // pour avant IE 7 semble-t-il try {
//	 httpRequest = new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) { try {
//	 httpRequest = new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {} } }
	 
	if (!httpRequest) {
		alert("Abandon, impossible d'ouvrir la communication");
		return false;
	}
	// Code readyState
	// 0 (non initialisée)
	// 1 (en cours de chargement)
	// 2 (chargée)
	// 3 (en cours d'interaction)
	// 4 (terminée)
	httpRequest.onreadystatechange = function() {
		getReponse(httpRequest, motClef);
	}; // réappelle la fct sur les changements readyState jusqu'à ==4
	
        httpRequest.open('POST', url, true);
	httpRequest.send(null);

}
/** ***** Méthodes utilisé dans la communication ****** */
/***
* Le contenu de la requête est récupéré dans 'httpRequest.responseText'
* Appelle de 'writeContents(....)
 * @param {XmlHttpRequest} httpRequest
 * @param {string} mot
 * @returns {undefined}
 */
function getReponse(httpRequest, mot) {
	// alert('ReadyState initial: '+httpRequest.readyState);
	if (httpRequest.readyState === 4) {
		if (httpRequest.status === 200) {
			//console.log(httpRequest.responseText);
			modifierListe(httpRequest.responseXML, mot);
		} else {
			alert('Status erreur: ' + httpRequest.status);
		}
	}
}

function modifierListe(xmlReponse, motClef) {
	/**
	 * Le contenu total du xml est reéu. La méthode filtre avec le mot clé
	 * appliqué comme expression réguliére sur le contenu texte de la balise
	 * <mot>.
	 */

	var listeDefinition = window.document.getElementById('reponse');
	var definitions = xmlReponse.getElementsByTagName("expression"); // tableau
																		// des
																		// expressions
	var mots = xmlReponse.getElementsByTagName("mot");
	// alert("Qté de champs: "+ definitions.length);

	retirerEnfants(listeDefinition); // efface la liste produite précédemment
									// dans le document client

	for (i = 0; i < definitions.length; i++) {
		var expression = new RegExp(motClef); // expression réguliére
		if (expression.test(mots[i].textContent)) { // vérifie si présence du
													// mot clef dans <mot>
			var nouveau = window.document.createElement("p"); // dans la page
																// locale
			nouveau.innerHTML = definitions[i].textContent;
			listeDefinition.appendChild(nouveau);
		}
	}

}

function retirerEnfants(element) {
	while (element.childNodes.length > 0) {
                console.log("Effacer : "+ element.childNodes[0].textContent);
		element.removeChild(element.childNodes[0]);
	}
}