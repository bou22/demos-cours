/**
 * Démos de réglage d'événements sur un élément du document.
 */

function setEvent(){

    let h = document.getElementById("h1");
    h.addEventListener(
        "mouseover",            //https://developer.mozilla.org/en-US/docs/Web/API/Element#focus_events
        alerter,
        true
    )
    h.addEventListener("mouseout",
    function(e){
        e.currentTarget.style.backgroundColor = "white";
    },
        true
    )
}

function alerter(){
    alert("You better watch this...");
}


function enleverEvent(){
    let h = document.getElementById("h1");
    h.removeEventListener("mouseover",alerter,true);
}