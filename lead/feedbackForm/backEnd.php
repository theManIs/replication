<?php
include 'config.php';
/*
echo 'Ваше имя: ' . $_GET['name'];
echo ' Почта : ' . $_GET['mail'];
echo ' Сообщение: ' . $_GET['mes'];
echo ' Центр: ' . $_GET['center'];
echo ' Отдел: ' . $_GET['dep'];
*/

/*
$query_string = array();
parse_str($_SERVER['QUERY_STRING'], $query_string);
if (isset($action)) {
} elseif (isset($query_string['write']) && $query_string['write'] == true) {
	write_message($query_string);
}
function write_message(array $arr) {
	foreach ($arr as &$v)
		$v = htmlentities($v, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
	extract($arr);
	$script = M_sql::Q();
	$script->insert('message_in');
	$script->set('token', 'name', 'mail', 'message', 'service', 'department');
	$script->bind($token, $name, $mail, $mes, $center, $dep);
	$script->send();
	echo 'Вы успешно записали строку номер ' . $script->pdo->lastInsertId();
}
*/
var_dump($_REQUEST);
echo 'Hooray!';