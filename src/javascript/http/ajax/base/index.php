<!DOCTYPE html>

<html>
    <head>
<script type="text/javascript" language="javascript">

    function faireRequete() {
    /*
     * #1 préparer la requête:
     *                      - instancier l'objet
     *                      - définir l'url
     */
        var url = "reponse.php?nom=MikeBossy"; // �quivalent � <form action="reponse.php"

        var httpRequest = false;

        httpRequest = new XMLHttpRequest();

        if (!httpRequest) {
            alert('Abandon :( Impossible de créer une instance XMLHTTP');
            return false;
        }
        
    /*
     * #2 envoyer la requête au serveur
     *                          - définir la méthode
     *                          - envoyer la requête
     */
        
        httpRequest.onreadystatechange = function() { afficherReponse(httpRequest); };
        
        //httpRequest.onreadystatechange = afficherReponse2;
        httpRequest.open('GET', url, true);
        httpRequest.send(null);

    }

    function afficherReponse(httpRequest) {

        alert("ReadyState: "+httpRequest.readyState);
        httpRequest.onprogress = (console.log(httpRequest.readyState/4));
        console.log(httpRequest);

        if (httpRequest.readyState == XMLHttpRequest.DONE) { //4
            
            if (httpRequest.status == 200) {
                console.log(httpRequest.responseText);
                alert(httpRequest.responseText);
                
            } else {
                console.log('La requête ne s\'est pas réalisée.');
            }
        }

    }
</script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <button onclick="faireRequete();">Cliquez pour voir</button>
    </body>
</html>
