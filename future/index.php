<?php
include 'config.php';
$start = new C_primary();
$start->getVars($_POST);
$start->write();
$inc = $start->template($start->read());
include 'html.html';
?>