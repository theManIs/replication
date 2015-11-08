<?php
include 'php/config.php';
$beforePrint = new M_beforePrint();
$beforePrint->returnNote();
$echoPage = new V_buildPage();
$echoPage->getPage();
?>
