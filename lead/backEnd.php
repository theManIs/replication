<?php
include 'config.php';
/*
echo 'Ваше имя: ' . $_GET['name'];
echo ' Почта : ' . $_GET['mail'];
echo ' Сообщение: ' . $_GET['mes'];
echo ' Центр: ' . $_GET['center'];
echo ' Отдел: ' . $_GET['dep'];
*/
//print_r($_SERVER);
$query_string = array();
//print_r(parse_url($_SERVER['REQUEST_URI']));
parse_str($_SERVER['QUERY_STRING'], $query_string);
//print_r($query_string);
//backEnd.php?name=name&mail=mail&mes=mes&dep=dep&center=center&token=17415&write=true
//echo $query_string['write'];
if (isset($action)) {
	//some action
} elseif (isset($query_string['write']) && $query_string['write'] == true) {
	write_message($query_string);
}
function write_message(array $arr) {
	foreach ($arr as &$v)
		$v = htmlentities($v, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
	//print_r($arr);
	extract($arr);
	//exit;
	//echo $token;
	$script = M_sql::Q();
	$script->insert('message_in');
	$script->set('token', 'name', 'mail', 'message', 'service', 'department');
	$script->bind($token, $name, $mail, $mes, $center, $dep);
	$script->send();
	echo 'Вы успешно записали строку номер ' . $script->pdo->lastInsertId();
	//var_dump($script);
}