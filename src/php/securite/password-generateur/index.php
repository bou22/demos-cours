<?php
$hache = password_hash("unmotdepassecompliqué", PASSWORD_DEFAULT);
echo $hache;

echo "<br />";

// $hache = file_get_contents('pwd.txt');

var_dump(password_verify("unmotdepassecompliqué",$hache));