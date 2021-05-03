<?php


function setSession($info) {
    session_name("auth");
    session_start();
    $_SESSION['infoAuth'] = $info;
}

function getSessionExiste(){
    $sessionEstValide=false;
    
    session_name("auth");
    session_start();
    
    if (isset($_SESSION['infoAuth']) && !empty($_SESSION['infoAuth'])){
        $sessionEstValide = true;
    } 
    
    return $sessionEstValide;
}
