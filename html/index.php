<?php 
function buildPage(){
	$inc = file_get_contents('html/body.html');
	include 'html/header.html';
}
buildPage();
?>
