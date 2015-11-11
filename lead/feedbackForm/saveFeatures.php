<?php
include 'config.php';
//$_POST['form_token'] = '123456';
//$_POST['form_json'] = '[["color","coral"],["title","Отправить сообщение"],["notice","Оставьте ваши контактные данные, и мы свяжемся с вами в ближайшее время"],["question","Введите ваш вопрос"],["send","Отправить"],["close","Закрыть"],["push","Оставить данные"],["tComplete","Сообщение"],["complete","Вы успешно отправили свои контактные данные"],["field0","Новое поле"],["select0",[["option0","Название"],["option1","Поле 1"],["option2","Поле 2"],["option3","Поле 3"]]]]';
$form_token = $_POST['form_token'];
$form_json = $_POST['form_json'];

function write($form_token, $form_json) {
	$toBase = M_sql::Q();
	$toBase->insert('form_widget')->set('form_token', 'form_json')->bind($form_token, $form_json)->send();
	return $toBase->pdo->lastInsertId();
}
function read($from_token) {
	$fromBase = M_sql::Q();
	$fromBase->select('*')->from('form_widget');
	$fromBase = $fromBase->send();
	return $fromBase->fetchAll();
}
function readUnit($form_token) {
	echo 'Вы успешно получили из базы данных ';
	var_dump(read($form_token));
}
function writeUnit($form_token, $form_json) {
	echo 'Вы успешно записали строку номер ' . write($form_token, $form_json);
}
writeUnit($form_token, $form_json);
//readUnit($form_token);