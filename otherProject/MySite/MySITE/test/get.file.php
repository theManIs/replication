<?php
/*
$b = $argv[1];
$a = 'C:/xampp/htdocs/mysite/test/' . basename($argv[1]);

$p = file_get_contents($b);
$k = file_put_contents($a, $p);
*/

echo $_SERVER["SCRIPT_FILENAME"];
?>