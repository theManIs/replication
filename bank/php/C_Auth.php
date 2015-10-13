<?php
class C_Auth extends C_Base
{
	public $check = false;
	private $style = 'css/auth.css';
	private $title = 'Авторизация';
	
	public function __construct($login, $pass, $authorize)
	{
		$this->login = $login; 
		$this->pass = $pass;
		$this->authorize = $authorize;
	}

	public function control()
	{
		if ($this->authorize !== null) self::proof();
		if ($this->check === false)	self::response();
	}
	
	private function response()
	{
		ob_start();
		include 'html/auth.html';
		$body = ob_get_clean();
		include 'html/shell.html';
	}
	
	private function proof()
	{
		$D = new M_query(M_access::getPDO());
		$D->select('id');
		$D->from('persons');
		$D->where('login', 'password');
		$D->bind($this->login, $this->pass);
		if ($D->getArray()) $this->check = true;
	}
	
}
?>