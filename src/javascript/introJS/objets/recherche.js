/**
 * La définition d'un classe avec JS.
 * Elle permet des setter/getter et une définition de constructeur.
 * Les variables de classe peuvent également être définies par des :
 * Exemple,
 * zoneRecherche : new array(........)
 */

class Recherche {
    constructor(){
        this.zoneRecherche = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    }
    set motClef(mot){
        this.mot = mot;
    }
    get estPresent(){
        var regexp = new RegExp(this.mot,'gi')
        console.log(regexp)
        this.resultat = this.zoneRecherche.find(jour => jour.match(regexp))
        if (this.resultat === undefined) this.resultat = "Aucun résultat"

        return this.resultat
   
    }
}