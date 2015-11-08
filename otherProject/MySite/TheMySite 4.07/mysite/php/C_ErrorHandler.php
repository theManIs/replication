<?php
//Обработчик ошибок

final class C_ErrorHandler
{
	public function __construct()
	{
		$user_error_handler = function($errno, $errstr) {
			if ($errstr == '5.56') {
				include 'html/v_error_handler.html';
				exit;
			} else {
				return false;
			}
			
		};
		set_error_handler($user_error_handler, E_ALL);
	}
}
?>