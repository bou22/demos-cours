    // Fonction de requêtes asynchrones
	
	
	function makeRequest(motClef) {
		var url = 'liste.xml'; 		//Prédéfini et changé ici
        var httpRequest = false;

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // Pour éviter l'erreur du serveur
            }
        }
        else if (window.ActiveXObject) { // Pour version antérieure à 10 de IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Abandon :( Impossible de créer une instance XMLHTTP');
            return false;
        }
										/* 	Code readyState	*/
										// 0 (non initialisée)
										// 1 (en cours de chargement)
										// 2 (chargée)
										// 3 (en cours d'interaction)
										// 4 (terminée) 
        httpRequest.onreadystatechange = function() { getContents(httpRequest, motClef); };  //réappelle la fct sur les changements readyState jusqu'à ==4
        httpRequest.open('POST', url, true);
        httpRequest.send(null);

    }

    function getContents(httpRequest, mot) {
    	/**
    	 * R�cup�re le r�sultat de la r�ponse de communication asynchrone
    	 * Appelle la fonction writeContents(...) qui r�alise l'affichage dynamique 
    	 * dans la page client.
    	 */
		//alert('ReadyState initial: '+httpRequest.readyState);
        if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
                //alert(httpRequest.responseText);
				writeContents(httpRequest.responseXML, mot); 
            } else {
                alert('Status erreur: '+ httpRequest.status);
            }
        } 
    }

	function writeContents(xmlReponse, motClef){
		/**
		 * xmlReponse contient tout le document xml lu par la requ�te asynchrone.
		 * Seulement les balises <expression> contenant le mot cl� seront affich�es.
		 * Le traitement du contenu est enti�rement effectu� ici.
		 */
	
	var listeDefinition = window.document.getElementById('reponse'); 
	var definitions = xmlReponse.getElementsByTagName("expression");	// tableau des expressions
	var mots		= xmlReponse.getElementsByTagName("mot");
	alert("Qtée de champs: "+ mots.length);
	
	for (i=0; i<mots.length; i++) {

		var nouveau = window.document.createElement("p"); 			//<p> dans la page client	
		var expression=new RegExp(motClef);    					
		if (expression.test(mots[i].textContent)) //v�rifie s'il y a pr�sence du mot clef
												  // pour chaque it�ration sur <expression>
									nouveau.innerHTML = mots[i].textContent;
		
		listeDefinition.appendChild(nouveau);
	}
		
	}
	
