<?php

//Узнаёт данные пользователя
class M_User extends C_Base
{
	public static $userData;
	public function __construct()
	{
		$data = self::$userData;
		$this->userLogin = $data[0]['uLogin'];
		$this->userMobile = $data[0]['mobile'];
		$this->userEmail = $data[0]['email'];
		$this->userPrivileges = $data[0]['pName'];
		parent::__construct();
	}
}

?>