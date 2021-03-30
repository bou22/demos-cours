
/**
 * Modification de la couleur d'arrière-plan de l'élément reçu 
 * en paramètre.
 * @param {DOM Element} element Élément à modifier.
 */
function selectDate(element) {

    switch (element.style.backgroundColor) {
        case "green":
            element.style.backgroundColor = "#ddd";
            break;
        default:
            element.style.backgroundColor = "green";
            break;
    }
}