/* 
 * To
 */

function texteInterieur(unElement){
    //var element = document.getElementById(id);
    console.log(window.confirm(unElement.textContent));
    console.log(window.alert(unElement.innerHTML));
}

function afficher(e){
    console.log(e.currentTarget);
    e.stopPropagation();
}

function ajouterEcouteurs(){
    var t1 = document.getElementById('t1');
    var t2 = document.getElementById('t2');
    var c1 = document.getElementById('c1');
    var c3 = document.getElementById('c3');
    
    t1.addEventListener("click",afficher,true);
    c1.addEventListener("click",afficher,true);
    
    t2.addEventListener("click",afficher,false);
    c3.addEventListener("click",afficher,false);
}
