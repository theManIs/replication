<?php

class M_Times extends M_User
{
	public function __construct()
	{
		$this->times = date('H:i', time()+3600);
		$this->dates = date('dS F');
		$this->day = date('l');
		parent::__construct();
	}
}

?>