/**
 * Démos de réglage d'événements sur un élément du document.
 */

function setEvent(){

    let titre = document.getElementById("h1");
    
    titre.addEventListener(
        "mouseover", //https://developer.mozilla.org/en-US/docs/Web/API/Element#focus_events
        function(e){alert("Fonction anonyme");},
        true
    )
    titre.addEventListener(
        "mouseout", //https://developer.mozilla.org/en-US/docs/Web/API/Element#focus_events
        pasSurligner,
        true
    )
}


function alerter(){
    alert("Attention !");
}





function enleverEvent(){

    let titre = document.getElementById("h1");

    titre.removeEventListener("mouseover",surligner,true);
}

function surligner(e){
    e.currentTarget.style.backgroundColor = "yellow";
}

function pasSurligner(e){
    e.currentTarget.style.backgroundColor = "white";
}