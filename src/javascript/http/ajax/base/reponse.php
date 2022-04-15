<?php

/* 
 * Script echo
 * 
 */

$nom = filter_input(INPUT_GET, "nom", FILTER_SANITIZE_SPECIAL_CHARS);

echo "Allo ".$nom;