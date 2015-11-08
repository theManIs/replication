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
	
	//Проверяет доступ
	private function Privilege($P)
	{
		$this->privilege = M_User::$userData[0]['uPrivileges'];
		$this->pDescribe = M_User::$userData[0]['pDescribe'];
		if($this->privilege>$P)
		{
			ob_start();
			include '../mysite/html/v_access_error.html';
			C_Page::$privilege = ob_get_clean();
			return true;
		}
		return false;
	}
	
	private function LastInsert($SQL)
	{
		$temp = self::Prepare($SQL);
		$PDO = $this->PDO;
		return $PDO->lastInsertId();
		
	}
	
	
	//Получает все статьи из базы данных
	public function SelectAll()
	{
		if(self::Privilege(6)) return;
		$SQL = "SELECT aId, title, intro as article
		FROM articles ORDER BY aId DESC;";
		return self::FetchAll($SQL);
	}
	
	//Производит поиск в базе данных
	public function SelectSearch()
	{
		if(self::Privilege(9)) return;
		$SQL = "SELECT aId, title, intro as article
		FROM articles WHERE `article` LIKE ? ORDER by `aId` DESC";
		return self::FetchAll($SQL);
	}
	
	//Получает одну отдельную статью из базы
	public function SelectSingle()
	{
		if(self::Privilege(8)) return;
		$SQL = "SELECT aId, title, article FROM articles WHERE `title` = ? ;";
		return self::FetchAll($SQL);
	}
	
	//Получает комментарии для статьи
	public function ReciveComments()
	{
		if(self::Privilege(8)) return;
		$SQL = "SELECT cId, comment, addTime FROM comments 
		LEFT JOIN articles USING(`aId`) 
		WHERE  `title` = ? ;";
		return self::FetchAll($SQL);
	}
	
	//Удаляет статью из базы
	public function ConfirmDelete()
	{
		if(self::Privilege(6)) return true;
		$SQL = "DELETE FROM articles WHERE `aId`= ? ;";
		self::Prepare($SQL);
	}
	
	//Добавляет статью в базу данных
	public function AddArticle()
	{
		if(self::Privilege(7)) return true;
		$SQL = "INSERT articles SET `article` =  ? ,
		`intro` = LEFT(`article`, LOCATE('.', `article`, 200)),
		`title` = TRIM('\r\n' FROM LEFT(`article`, LOCATE('\n', `article`, 4))),
		`theme` = ? ;";
		self::Prepare($SQL);
	}
	
	//Заполняет форму для редактирования
	public function UpdateForm()
	{
		if(self::Privilege(6)) return true;
		$SQL = "SELECT aId, article FROM articles WHERE `aId` = ? ;";
		return self::FetchAll($SQL);
	}
	
	//Вносит изменения в статью
	public function ConfirmUpdate()
	{
		if(self::Privilege(6)) return true;
		$SQL = "UPDATE articles SET `article` = ? , 
		`title`= TRIM('\r\n' FROM LEFT(`article`, LOCATE('\n', `article`, 4))),
		`intro` = LEFT(`article`, LOCATE('.', `article`, 200))	WHERE `aId` = ? ;";
		self::Prepare($SQL);
	}
	
	//Возвращает версию текущего SQL сервера
	public function GetVersion()
	{
		$SQL = "SELECT VERSION() as version";
		return self::FetchAll($SQL);
	}
	
	//Добавляет комментарий к статье
	public function ConfirmComments()
	{
		if(self::Privilege(8)) return true;
		$SQL = "INSERT INTO comments
		SET `aId` = ? , `comment` = ? , `addTime` = DEFAULT;";
		self::Prepare($SQL);
	}
	
	//Удаляет комментарий к статье
	public function DelComments() 
	{
		if(self::Privilege(6)) return true;
		$SQL = "DELETE FROM comments WHERE `cId` = ? ;";
		self::Prepare($SQL);
	}
	
	//Проверяет авторизацию пользователя
	public function SelectUser()
	{
		$SQL = "SELECT userId FROM users WHERE `uLogin` =  ? 
		AND `uPassword` =  ? ;";
		return self::FetchAll($SQL);
	}
	
	//Получает данные пользователя
	public function GetUser()
	{
		$SQL = "SELECT uPrivileges, uLogin, mobile, email, pDescribe, pName
		FROM users, privileges WHERE `pMask`=`uPrivileges` AND `uLogin` = (SELECT uLogin FROM sessions
		WHERE `uCookie` =  ? );";
		return self::FetchAll($SQL);
	}
	
	//Проверяет наличие логина в базе
	public function ExistLogin()
	{
		$SQL = "SELECT * FROM users WHERE uLogin = ? LIMIT 1;";
		return self::FetchAll($SQL);
	}
	
	//Обновляет сессии для активных пользователей
	public function UpdateSession()
	{
		$SQL = "UPDATE sessions SET `finish`=NULL
		WHERE `uCookie`= ? ;";
		self::Prepare($SQL);
	}
	
	//Удаляет устаревшие сессии старше 30мин
	public function DeleteSession()
	{
		$SQL = "DELETE FROM sessions WHERE 
		(EXTRACT(HOUR_SECOND FROM NOW())-EXTRACT(HOUR_SECOND FROM `finish`))>3000;";
		self::Prepare($SQL);
	}
	
	//Добавляет нового пользователя в базу
	public function AddUser()
	{
		$SQL = "INSERT users (`uLogin`, `uPassword`, `mobile`, 
		`email`) VALUES ( ? , ? , ? , ? );";
		self::Prepare($SQL);
	}
	
	//Добавляет сессию в таблицу
	public function AddSession()
	{
		$SQL = "LOCK TABLES sessions WRITE;
		INSERT sessions (`uLogin`, `address`,`start`)
		VALUES ( ? , '".$_SERVER['REMOTE_ADDR']."', NULL); 
		UPDATE sessions SET `uCookie` = SHA1(last_insert_id())
		WHERE `sessionId` = last_insert_id();";
		$SQuery = "SELECT `uCookie` FROM sessions
		WHERE `sessionId` = last_insert_id();
		UNLOCK TABLES;";
		self::Prepare($SQL);
		$arr = self::Prepare($SQuery);
		return $arr->fetchAll();
	}
	
	//Получить информацию о пользователях
	public function GetAllUsers() 
	{
		if(self::Privilege(4)) return true;
		$SQL = "SELECT * FROM users LEFT JOIN privileges ON `uPrivileges`=`pMask`;";
		return self::FetchAll($SQL);
	}
	
	//Выбрать
	public function Select($par)
	{
		//['column', 'table', 'join', 'using', 'where']
		$SQL = "SELECT %s FROM %s WHERE %s = ? OR %s = ?;";
		$SQL = vsprintf($SQL, $par);
		return self::FetchAll($SQL);
	}
	
	//Добавляет
	public function Insert($par)
	{
		//['table', 'column=value']
		$SQL = "INSERT %s SET %s;";
		$SQL = vsprintf($SQL, $par);
		return self::LastInsert($SQL);
	}
	
	//Удалить
	public function Delete($par)
	{
		//['table', 'where']
		$SQL = "DELETE FROM %s WHERE %s LIMIT 1;";
		$SQL = vsprintf($SQL, $par);
		return self::Prepare($SQL);
	}
}

?>