<?php

//Добавление записи в базу данных
class M_Query_Insert extends M_Access
{
	public $line;
	
	public function __construct($array)
	{
		$this->line = '\''.implode('\', \'', $array).'\'';
	}
	
	public static function AddUser($array)
	{
		$line = '\''.implode('\', \'', $array).'\'';
		$SQL = 
		"INSERT users (`userLogin`, `userPassword`, `userMobile`, `userEmail`)
		VALUES (%s);";
		$SQL = sprintf($SQL, $line);
		return M_Access::GetM_Access($SQL);
	}
	
	public static function AddSession($login)
	{
		$SQL = "LOCK TABLES sessions WRITE;
		INSERT sessions (`userLogin`, `address`,`start`)
		VALUES ('".$login."', '".$_SERVER['REMOTE_ADDR']."', NULL); 
		UPDATE sessions SET `sessionCookie` = SHA1(last_insert_id())
		WHERE `sessionId` = last_insert_id();";
		$SQuery = "SELECT `sessionCookie` FROM sessions
		WHERE `sessionId` = last_insert_id();
		UNLOCK TABLES;";
		M_Access::AddM_Access($SQL);
		return M_Access::GetM_Access($SQuery);
	}
}

?>