/**
 * Démos de réglage d'événements sur un élément du document.
 */

function setEvent(){
    let h = document.getElementById("h1");
    h.addEventListener("mouseover",
        function(e){
            console.log(e);
            e.currentTarget.style.backgroundColor = "yellow";
            e.currentTarget.setAttribute("name","allo");
        },
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
    alert("Uo");
}