<?php 
function buildPage(){
	$inc = file_get_contents('vestibule.html');
	include 'regular.php';
}
buildPage();
//echo 'fuck';
?>
