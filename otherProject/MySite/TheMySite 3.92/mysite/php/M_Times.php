<?php

class M_Times extends M_User
{
	public static $hour;
	
	public function __construct()
	{
		$dTime = self::$hour;
		$this->times = $dTime->format('H:i');
		$this->dates = date('dS F');
		$this->day = date('l');
		parent::__construct();
	}
}

?>