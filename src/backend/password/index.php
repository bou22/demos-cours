<?php

echo password_hash("unmotdepassecompliqué", PASSWORD_DEFAULT);

echo "<br />";

$hache = file_get_contents('pwd.txt');

var_dump(password_verify("unmotdepassecompliqué",$hache));