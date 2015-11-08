<?php

//Добавление записи в базу данных
class M_Query_Select extends M_Access
{
	//Проверяет авторизацию пользователя
	public static function SelectUser($line)
	{
		$SQL = 
		"SELECT userId FROM users 
		WHERE userLogin = '".$line[0]."'
		AND userPassword = '".$line[1]."';";
		return M_Access::GetM_Access($SQL);
	}
	
	//Получает данные пользователя
	public static function GetUser($line)
	{
		$SQL = 
		"SELECT userPrivileges, userLogin, userMobile, userEmail
		FROM users 
		WHERE userLogin = (SELECT userLogin FROM sessions
		WHERE sessionCookie = '".$line."');";
		return M_Access::GetM_Access($SQL);
	}
	
	//Проверяет наличие логина в базе
	public static function ExistLogin($login)
	{
		$SQL = "SELECT * FROM users WHERE userLogin = '".$login."' LIMIT 1;";
		return M_Access::GetM_Access($SQL);
	}
}

?>