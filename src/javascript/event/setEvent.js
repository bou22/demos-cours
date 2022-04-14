/**
 * Démos de réglage d'événements sur un élément du document.
 */

function setEvent(){

    let titre = document.getElementById("h1");
    
    titre.addEventListener(
        "mouseover", //https://developer.mozilla.org/en-US/docs/Web/API/Element#focus_events
        alerter,
        true
    )
    titre.addEventListener(
        "mouseout", //https://developer.mozilla.org/en-US/docs/Web/API/Element#focus_events
        surligner,
        true
    )
}


function alerter(){
    alert("Attention !");
}





function enleverEvent(){

    let titre = document.getElementById("h1");

    titre.removeEventListener("mouseover",alerter,true);
    titre.removeEventListener("mouseout",surligner,true);
    titre.style.backgroundColor = "white";
}

function surligner(e){
    e.currentTarget.style.backgroundColor = "yellow";
}

function pasSurligner(e){
    e.currentTarget.style.backgroundColor = "white";
}