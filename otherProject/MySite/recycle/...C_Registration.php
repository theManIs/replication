<?php

class C_Registration extends C_Autorisation
{
	public function __construct()
	{
		self::Registration();
	}
		
	//Страница регистрации пользователя
	private function Registration()
	{
		
		//Инициализирует переменные
		$variables = array('login', 'password', 'repeat', 'email', 'mobile',
		'first', 'second', 'third', 'fourth', 'fifth', 'isSet');
		foreach($variables as $k => $v) $$v = NULL;
		
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		
		ob_start();
		include 'html/v_registration.html';
		$stencil = ob_get_clean();
		exit($stencil);
	}
}

?>