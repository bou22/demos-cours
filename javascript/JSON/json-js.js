


function modifier(nom,prenom,numero) {
    //Recevoir le json du "réseau"
    let structure = JSON.parse(structureLinéarisée);

    structure.nom       = nom.value;
    structure.prenom    = prenom.value;
    structure.numero    = numero.value;

    //Envoyer le json dans le "réseau"
    structureLinéarisée = JSON.stringify(structure);
}

function consulter() {
    let div = document.getElementById("affichage");
    div.innerHTML = structureLinéarisée;
}

