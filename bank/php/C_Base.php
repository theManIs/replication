<?php
class C_Base
{
	public function getVars()
	{ 
		foreach($_REQUEST as $k => $v) { 
			$v = htmlentities($v, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
			$this->$k = $v;
		}
	}
	
	protected function initialize()
	{
		for ($i = 0, $c = func_num_args(); $i < $c; $i++) {
			$arg = func_get_arg($i);
			if(!isset($this->$arg)) $this->$arg = null;
		}
	}
	
	public function huri()
	{	
		if (isset($_GET['uri'])) $request = $GLOBALS['_GET']['uri'];
		if(empty($request)) {
			$page = '';
		} else {
			$meta = explode(".", $request);
			foreach($meta as $key => $into) 
			{
				if($into == '') unset($meta[$key]);
			}
			$page = $meta;
		}
		$this->page = $page;
	}
	
	public static function whatIsIt()
	{
		for($i = 1, $c = func_num_args(); $i < $c; $i++) {
			$v = func_get_arg($i);
			if (!empty($v)) {
				if (func_get_arg(0) === 's' && is_string($v) && trim($v) != false) {
					return true;
				} elseif (func_get_arg(0) === 'a' && is_array($v)) {
					return true;
				}
			}
			return false;
		}
	}
	
	public function auth()
	{
		self::initialize('login', 'pass', 'authorize');
		$auth = new C_Auth($this->login, $this->pass, $this->authorize);
		$auth->control();
		if ($auth->check) echo 'Авторизирован';
	}
	
	public function before()
	{
		
	}
	

}

?>