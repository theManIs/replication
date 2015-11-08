<?php


class MBasic 
{
	private $users = array();
	
	public function __construct($a)
	{
		$this->users = $a;
		self::Auth();
	}
	private function Auth()
	{
		if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
			self::Response();
		} else {
			$u = [$_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']];
			if (array_key_exists($u[0], $this->users)) {
				if (!($this->users[$u[0]] === $u[1])) self::Response();
			} else {
				self::Response();
			}
		}
	}
	private function Response()
	{
		http_response_code(401);
		$realm = date('Y-m-d');
		header('WWW-Authenticate: Basic realm="' . $realm . '"');
		exit('Enter username and password!');
	}
}
?>