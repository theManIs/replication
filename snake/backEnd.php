<?php
//$_POST['foo'] = 'Изуаний 201 1205';
include_once 'model.php';


$myFile = createFile('record.txt');
$recieve = $_POST['foo'];
$writeString = makeRow($myFile, $recieve);
file_put_contents($myFile, $writeString);
$theMas = array_filter(file($myFile));
$excecute = array();
while (list($key, $val) = each($theMas)) array_push($excecute, explode(' ', $val));
echo json_encode($excecute);
//print_r($excecute);
?>