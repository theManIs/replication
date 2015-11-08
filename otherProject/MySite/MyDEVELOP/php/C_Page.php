<?php

//Основной контроллер страниц
class C_Page extends C_Base
{
	public static $privilege;
	public static $userData;
	public static $hour;
	
	public function __construct()
	{
		$mySQL = new M_Query(array('someValue'));
		$mySQL = $mySQL->GetVersion();
		$this->apache = mb_substr($_SERVER['SERVER_SOFTWARE'], 0, 13);
		$this->mySQL = $mySQL[0]['version'];
		$this->php = phpversion();
		$this->nav_bar = 'Навигация';
		$this->navPanel = NULL;
		parent::__construct();
		if(!isset($this->search)) $this->search = NULL;
		ob_start();
		include 'html/v_search-string.html';
		$this->search_string = ob_get_clean();
		$this->userLogin = self::$userData[0]['ULOGIN'];
		$dTime = self::$hour;
		$this->times = $dTime->format('H:i');
		$this->dates = date('dS F');
		$this->day = date('l');
		$this->style = file_get_contents('../MySITE/css/single.css');
		parent::__construct();
	}
	
	//Создание объекта страницы
	public static function SwitchPage()
	{	
		switch(self::$URI)
		{
			default:
			case 'Статьи':
			//Страница со статьями
			$sample = new M_Library(array());
			$sample->PatternConstruct();
			
			case 'Добавить':
			case 'Изменение':
			//Страница создания статьи
			$sample = new M_Article(array());
			$sample->PatternConstruct();
			
			case 'Пользователи':
			//Учётные записи пользователей
			$sample = new M_Users();
			$sample->PatternConstruct();
		}
	}	
		

	//Генерирует основной шаблон
	private function PatternConstruct()
	{
		exit(include '../MySITE/html/v_general-pattern.html');
	}
	
}
?>