<?php 
//Подключение к базе данных
class PDObjectST extends Controller
{
	private static $instance;
	protected $pdo;
	
	private function __construct() {
		try
		{
			$this->pdo = new PDO
			('mysql:host=localhost;dbname=my_bd;charset=utf8', 'root', '');
		}
		catch(PDOException $Exception)
		{
			exit($Exception->getMessage());
		}
	}
	
	public static function GetPDO()
	{
		if(empty(self::$instance))
			self::$instance = new PDObjectST();
		return self::$instance;
	}
}
?>