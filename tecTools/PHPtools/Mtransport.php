<?php
class MTransport
{
	public $URI = NULL;
	public $POST = array();
	
	public function __construct()
	{
		if (isset($_SERVER['QUERY_STRING'])) parse_str($_SERVER['QUERY_STRING'], $it);
		$this->URI = isset($it['it']) ? $URI = $it['it'] : $this->URI = 'reg';
		foreach ($_POST as $k => $v) $this->POST[$k] = htmlentities($v, ENT_QUOTES, 'UTF-8');
	}
}
?>