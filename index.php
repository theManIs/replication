<?php 
function buildPage(){
	$inc = file_get_contents('hole.html');
	include 'regular.php';
}
buildPage();
//echo 'fuck';
?>
