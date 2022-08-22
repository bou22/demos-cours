/**
 * 
 */

class Recherche {
    constructor(){
        this.zoneRecherche = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    }

    trouver(mot){
        this.motClef = mot
        var regexp = new RegExp(this.motClef,'gi')
        
        this.resultat = this.zoneRecherche.find(jour => jour.match(regexp))
        if (this.resultat === undefined) this.resultat = "Aucun résultat"
        return this.resultat

    }
}