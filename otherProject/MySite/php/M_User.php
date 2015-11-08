<?php

//Узнаёт данные пользователя
class M_User extends M_Search
{
	public function __construct()
	{
		$data = $GLOBALS['userData'];
		$this->userLogin = $data[0]['uLogin'];
		$this->userMobile = $data[0]['mobile'];
		$this->userEmail = $data[0]['email'];
		$this->userPrivileges = $data[0]['uPrivileges'];
		parent::__construct();
	}
}

?>