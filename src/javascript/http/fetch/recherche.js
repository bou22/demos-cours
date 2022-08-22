/**
 * 
 */

class Recherche {

    async trouver(mot){
        let jsonSemaine = await fetch('./getSemaineFR.php')

        this.zoneRecherche = await jsonSemaine.json()

        this.motClef = mot
        var regexp = new RegExp(this.motClef,'gi')
        
        this.resultat = this.zoneRecherche.find(jour => jour.match(regexp))
        if (this.resultat === undefined) this.resultat = "Aucun résultat"
        
        console.log(this.resultat)
        return this.resultat

    }
}