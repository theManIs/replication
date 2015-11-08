<?php
define('LITE', 'bases/this.db');
class MLiteConnect
{
	private static $lite = NULL;
	private function __construct()
	{
		//Ничего не происходит
	}
	public static function Instance()
	{
		try {
			if (!isset(self::$lite))
				self::$lite = new SQLite3(LITE);
			return self::$lite;
		} catch(PDOException $e) {
			exit($e->getMessage().'<br>'.$e->getTraceAsString());
		}
	}

}
?>