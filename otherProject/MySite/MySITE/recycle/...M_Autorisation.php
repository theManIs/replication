<?php

//Проверяет авторизацию
class M_Autorisation extends C_Base
{
	private $authorize;
	private static $instance;
	
	private function __construct()
	{
		$this->authorize = true;
	}
	
	public static function Permit()
	{
		if(self::$instance == NULL)
			self::$instance = new M_Autorisation();
		return self::$instance;
	}
	
	public function Instruct()
	{
		return $this->authorize;
	}
}


?>