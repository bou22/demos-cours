<?php


function setSession($info) {
    setSessionOn();
    $_SESSION['infoAuth'] = $info;
}

function getSessionExiste(){
    $sessionEstValide=false;
    
    setSessionOn();
    
    if (isset($_SESSION['infoAuth']) && !empty($_SESSION['infoAuth'])){
        $sessionEstValide = true;
    } 
    
    return $sessionEstValide;
}

function setSessionOn() {
    
    session_name("auth");
    return session_start();
}
