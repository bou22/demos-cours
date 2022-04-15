    // Fonction de requetes asynchrones
	
	
    function changerLangue(langue) {
        var url = 'jours.php';  		//Concatene e la langue choisie
        var parametres= "langue="+langue+"&nom=allo";
        var httpRequest = false;

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            objetRequete = new XMLHttpRequest();
            /*if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/html');
            }*/
        }
        else
        	objetRequete = new ActiveXObject("Microsoft.XMLHTTP");

        if (!objetRequete) {
            alert("Requête impossible, contactez votre administrateur réseau.");
            return false;
        }
        //Envoyer les paramètres d'entête
        
        objetRequete.onreadystatechange = function() { recupererReponse(objetRequete); };  //reappelle la fct sur les changements readyState jusqu'e ==4
        objetRequete.open('POST', url, true);
        objetRequete.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        objetRequete.send(parametres);

    }
/*******        Methodes utilise dans la communication     *******/
	
    function recupererReponse(objetRequete) {
    	/**
    	 * Le contenu de la requete est recupere dans 'objetRequete.responseText'
    	 * Appelle de 'writeContents(....)
    	 */
    	
        if (objetRequete.readyState == 4) {
            if (objetRequete.status == 200) {
            	modifierPageClient(objetRequete.responseText); 
            } else {
                alert('Status erreur: '+ objetRequete.status);
            }
        } 
    }

	function modifierPageClient(reponseTexte){
		/**
		 * La reponse du script serveur est deserialisee dans un tableau
		 */

	var jours = reponseTexte.split(',');
	
	var liste = window.document.getElementById('jours');
	effacerLaListe(liste); //efface la liste produite precedemment dans le document client

	for (i=0; i<jours.length; i++) {
		//Manipulation DOM pour faire un dropdown
			var item = window.document.createElement("option"); 			//dans la page locale	
			var attribut = window.document.createAttribute('value');
			attribut.nodeValue = i;
			item.setAttributeNode(attribut);
			var valeur = window.document.createTextNode(jours[i]);
			item.appendChild(valeur);
			liste.appendChild(item);
	}
		
	}
	
	function effacerLaListe(element){
		while (element.childNodes.length > 0) {
			//alert("Effacer : "+ element.childNodes[0].textContent);
			element.removeChild(element.childNodes[0]);
		}
	}