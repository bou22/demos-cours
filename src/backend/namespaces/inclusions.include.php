<?php

namespace classes;
include 'api1/Nom.classe.php';
include 'api2/Nom.classe.php';

use api1;
use api2;

$c1 = new api1\Nom();
$c2 = new api2\Nom();

echo $c1->nom."<br>".$c2->nom;