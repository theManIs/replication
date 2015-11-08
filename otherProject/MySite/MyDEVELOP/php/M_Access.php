<?php

//Выполняет запросы к базе данных
class M_Access
{
	public $pdo;
	private static $instance;
	
	//Создаёт объект PDO в стиле Single Tone
	private function __construct() 
	{
		try	{
			$pdo = new PDO
			('mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASSWORD);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$this->pdo = $pdo;
		} catch(PDOException $e) {
			exit($e->getMessage().'<br>'.$e->getTraceAsString());
		}
	}
	
	//Позволяет создать объект класса Single Tone
	public static function GetPDO()
	{
		if(self::$instance == NULL)
			self::$instance = new M_Access();
		return self::$instance;
	}
}
?>