    // Fonction de requ�tes asynchrones
	
	
	function changerLangue(langue) {
		var url = 'jours.php?langue='+langue;  		//Concat�n� � la langue choisie
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
            alert("Abandon, impossible d'ouvrir la communication");
            return false;
        }

        objetRequete.onreadystatechange = function() { recupererReponse(objetRequete); };  //r�appelle la fct sur les changements readyState jusqu'� ==4
        objetRequete.open('GET', url, true);
        objetRequete.send(null);

    }
/*******        M�thodes utilis� dans la communication     *******/
	
    function recupererReponse(objetRequete) {
    	/**
    	 * Le contenu de la requ�te est r�cup�r� dans 'objetRequete.responseText'
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
		 * La r�ponse du script serveur est d�s�rialis�e dans un tableau
		 */

	var jours = reponseTexte.split(',');
	
	var liste = window.document.getElementById('jours');
	effacerLaListe(liste); //efface la liste produite pr�c�demment dans le document client

	for (i=0; i<jours.length; i++) {
		//Manipulation DOM
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