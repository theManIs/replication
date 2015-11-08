<?php
class C_base 
{
	public function __construct()
	{ 
		foreach($_REQUEST as $k => $v) { 
			$v = htmlentities($v, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
			$this->$k = $v;
		}
	}
	
	protected function initialize($list = array())
	{
		foreach($list as $v) {
			if(!isset($this->$v)) {
				$this->$v = null;
			}
		}
	}
}
?>