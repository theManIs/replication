<?php
//Отчёт об ошибке
class C_Errors extends C_Base
{
	public $message;
	public $request;
	public $source;
	
	public function __construct($arr)
	{
		$this->massege = $arr[0];
		$this->trace = $arr[1];
		$this->request = $arr[2];
	}
	
	//Выводит ошибку и прекращает исполнение кода
	public function EchoError()
	{
		$errorPage = 'html/v_error2.html';
		
		include $errorPage;
		exit;
	}
}
?>