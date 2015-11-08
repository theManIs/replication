<?php
final class ADigest
{
	private $users = array();
	
	public function __construct($a)
	{
		$this->users = $a;
		self::Auth();
	}
	
	public function Auth() 
	{
		$realm = date('Y-m-d');
		if (!isset($_SERVER['PHP_AUTH_DIGEST'])) {
			http_response_code(401);
			$head = 'WWW-Authenticate: Digest realm="%s", qop="auth", nonce="%s", opaque="%s"';
			$header = sprintf($head, $realm, uniqid(), md5($realm));
			header($header);
			exit("You need to enter a valid username and password.");
		} else {
			self::Authenticate();
		}
	}
	private function Authenticate() 
	{
		$realm = date('Y-m-d');
		if (!($data = self::http_digest_parse($_SERVER['PHP_AUTH_DIGEST']))
			|| !isset($this->users[$data['username']])) exit('Fuck!');
		$A1 = md5($data['username'] . ':' . $realm . ':' . $this->users[$data['username']]);
		$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
		$valid_response = md5(sprintf('%s:%s:%s:%s:%s:%s', 
			$A1, $data['nonce'], $data['nc'], $data['cnonce'],	$data['qop'], $A2));
		if ($data['response'] != $valid_response) exit('Crap!');
	}
	private function http_digest_parse($txt) {
		$needed_parts = [
			'nonce' => 1, 'nc' => 1, 'cnonce' => 1, 'qop' => 1,
			'username' => 1,'uri' => 1, 'response' => 1
		];
		$data = array();
		$keys = implode('|', array_keys($needed_parts));		
		preg_match_all('@(' . $keys . ')=(?:([\'"])(^\2]+?)\2|([^\s,]+))@',
			$txt, $matches, PREG_SET_ORDER);		
		foreach ($matches as $m) {
			$data[$m[1]] = $m[3] ? $m[3] : trim($m[4], '"');
			unset($needed_parts[$m[1]]);
		}
		return $needed_parts ? false : $data;
	}
}
?>