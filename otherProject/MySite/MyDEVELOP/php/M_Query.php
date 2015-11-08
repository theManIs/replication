<?php 
//Библиотека запросов к базе данных
class M_Query extends C_Base
{
	public $massive = array();
	public $PDO;
	
	public function __construct($array)
	{
		try
		{
		if(empty($array)) return;
		$PDO = M_Access::GetPDO();
		$PDO = $PDO->pdo;
		$this->PDO = $PDO;
		$this->massive = $array;
		} catch(PDOException $e) {
			exit($e->getMessage().' '.$e->getTraceAsString());
		}
	}
	
	//Готовит SQL-запрос к исполнению
	private function Prepare($SQL)
	{
		try
		{
		$PDO = $this->PDO;
		$PDOS = $PDO->prepare($SQL);
		if(isset($this->massive[0]))
			$PDOS->bindValue(1, $this->massive[0], PDO::PARAM_STR);
		if(isset($this->massive[1]))
			$PDOS->bindValue(2, $this->massive[1], PDO::PARAM_STR);
		if(isset($this->massive[2]))
			$PDOS->bindValue(3, $this->massive[2], PDO::PARAM_STR);
		if(isset($this->massive[3]))
			$PDOS->bindValue(4, $this->massive[3], PDO::PARAM_STR);
		if(isset($this->massive[4]))
			$PDOS->bindValue(5, $this->massive[4], PDO::PARAM_STR);
		if(isset($this->massive[5]))
			$PDOS->bindValue(6, $this->massive[5], PDO::PARAM_STR);
		$PDOS->execute();
		} catch(PDOException $e) {
			if ($e->getCode() != '23000')
				exit($e->getMessage().'<br>'.$e->getTraceAsString());
		}
		return $PDOS;
	}
	
	//Возвращает массив
	private function FetchAll($SQL)
	{
		$arr = self::Prepare($SQL);
		return $arr->fetchAll();
	}
	
	private function LastInsert($SQL)
	{
		$temp = self::Prepare($SQL);
		$PDO = $this->PDO;
		return $PDO->lastInsertId();
		
	}
	
	//Возвращает версию текущего SQL сервера
	public function GetVersion()
	{
		$SQL = "SELECT VERSION() as version";
		return self::FetchAll($SQL);
	}
	
	//Проверяет наличие логина в базе
	public function ExistLogin()
	{
		$SQL = "SELECT * FROM users WHERE ULOGIN = ? LIMIT 1;";
		return self::FetchAll($SQL);
	}
	
	//Обновляет сессии для активных пользователей
	public function UpdateSession()
	{
		$SQL = "UPDATE SESSIONS SET `FINISH`=NULL
		WHERE `UCOOKIE`= ? ;";
		self::Prepare($SQL);
	}
	
	//Удаляет устаревшие сессии старше 30мин
	public function DeleteSession()
	{	
		$SQL = "DELETE FROM SESSIONS WHERE 
		(EXTRACT(HOUR_MINUTE FROM NOW())-EXTRACT(HOUR_MINUTE FROM `FINISH`))>59;";
		self::Prepare($SQL);
	}
	
	//Выбрать
	public function Select($par)
	{
		//['column', 'table', 'where', 'where']
		$SQL = "SELECT %s FROM %s WHERE %s = ? OR %s = ?;";
		$SQL = vsprintf($SQL, $par); //echo $SQL; exit;
		return self::FetchAll($SQL); 
	}
	
	//Добавляет
	public function Insert($par)
	{
		//['table', 'column1', 'column2', 'column3']
		$SQL = "INSERT %s SET %s = ?, %s = ?, %s = ?;";
		$SQL = vsprintf($SQL, $par);
		return self::LastInsert($SQL);
	}
	
	//Удалить
	public function Delete($par)
	{
		//['table', 'where']
		$SQL = "DELETE FROM %s WHERE %s = ? LIMIT 1;";
		$SQL = vsprintf($SQL, $par);
		return self::Prepare($SQL);
	}
	
	//Добавить много данных
	public function InsertV($par)
	{
		$SQL = "INSERT %s VALUES (%s);";
		$SQL = vsprintf($SQL, $par);
		return self::LastInsert($SQL);
	}
}

?>