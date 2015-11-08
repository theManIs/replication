<?php

//Основной контроллер страниц
class C_Page extends M_Times
{
	/*//public $inst;
	public $main_title;
	public $menu_list;
	//public $result_page;
	//public $include_page;
	//public $search;
	//public $switch_pattern;
	public $nav_bar;
	public $php;
	public $mySQL;
	public $apache;
	//public $search_string;
	public $title;
	public $article;
	public $button;
	public $v_button;
	public $aId;*/
	
	public function __construct($array)
	{
		$mySQL = new M_Query(array('someValue'));
		$mySQL = $mySQL->GetVersion();
		$this->apache = mb_substr($_SERVER['SERVER_SOFTWARE'], 0, 13);
		$this->mySQL = $mySQL[0]['version'];
		$this->php = phpversion();
		$this->nav_bar = 'Навигация';
		//$this->search = $array[5];
		//$this->inst = C_Base::HumanURI();
		//$this->search_string = '';
		$this->main_title = $array[0];
		$this->menu_list = $array[1];
		//s$this->result_page = $array[2];
		//if(!is_array($array[3])) $this->include_page = $array[3];
		//$this->switch_pattern = $array[4];
		if(isset($array[3]) && is_array($array[3])) 
		{
			$this->title = $array[3]['title'];
			$this->article = $array[3]['article'];
			$this->button = $array[3]['button'];
			$this->v_button = $array[3]['v_button'];
			$this->include_page = $array[2];
			if(isset($array[3]['aId'])) $this->aId = $array[3]['aId'];
		}
		parent::__construct($array);
	}
	
	public static function SwitchPage($page)
	{
		//Инициализирует переменные
		$variables = array('request', 'search', 'title', 'theme', 'article');
		foreach($variables as $k => $v) $$v = NULL;
		
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		
		//Создание объекта страницы
		switch($page)
		{
			default:
			
			//Главная страница
			case 'Вход':
			case 'Статья':
			$sample = new M_Single(/*array('Главная страница', 
			'Cамая главная страница'
			, '<h1 class="enter">Добро пожаловать!</h1>'
			//,'html/v_search-string.html', true, $search
			)*/);
			return print(self::General($sample));
			
			//Страница со статьями
			case 'Статьи':
			$sample = new C_Page(array('Статьи', 'Все статьи в блоге'
			//,'','','',''
			));
			return print(self::General($sample));
			
			/*//Страница поиска по статьям
			case 'Поиск':
			
			$sample = new C_Page(array('Поиск по блогу', 'Результаты поиска',
			$sSearch->IsM_Glue('html/v_wallpaper.html'),
			'html/v_search-string.html', true, $search));
			
			return print(self::General($sample));*/
			/*
			//Просмотр одной статьи
			case 'Статья':
			//$singleView = $GLOBALS['singleView'][0];
			$sample = new M_Single(/*array('Статья',
			'<img src="../mysite/png/notes.png">'.$singleView['title'],
			'<div class="text_align">'.$singleView['article'].
			'</div>'.$reciveComments->IsM_Glue('html/v_comments.html')*/
			//,
			/*'html/v_search-string.html',
			true, $singleView['title']));
			return print(self::General($sample));
			*/
			//Список статей, которые можно удалить
			case 'Удалить': 
			$sample = new C_Page(array('Удаление статьи','Можно удалять:',
			/*$selectDelete->IsM_Glue('html/v_wallpaper.html')*/'', '', '', ''));
			return print(self::General($sample));
			
			//Страница создания статьи
			case 'Добавить': 
			$sample = new M_Article(array('Добавьте статью','Итак, статья...',
			//'html/v_html-form.html',
			'', array('title' => $title, 'article' => $article,
			'button' => 'create','v_button' => 'Создать'), '', ''));
			//$sample->FormConstruct();
			return print(self::General($sample));
			
			//Загрузка формы для редактирования статьи
			case 'Изменение':
			$updateForm = $GLOBALS['uForm'];
			$sample = new M_Article(array('Изменить статью','Итак, статья...','',
			array('title' => $updateForm->title,
			'article' => $updateForm->article,'button' => 'update',
			'v_button' => 'Изменить','aId' => $updateForm->aId), '', '',''));
			return print(self::General($sample));
			
			//Список статей, которые можно изменить
			case 'Изменить': 
			//$selectUpdate = $GLOBALS['sUpdate'];
			$sample = new C_Page(array('Изменить статью','Можно изменить:',
			/*$selectUpdate->IsM_Glue('html/v_wallpaper.html')*/'','','',''));
			return print(self::General($sample));
			
			//Список статей к которым можно оставить комментарии
			case 'Комментарии': 
			$sample = new C_Page(array('Оставить отзыв','Можно оставить отзыв о статьях:',
			//$selectComments->IsM_Glue('html/v_wallpaper.html'),
			'', '','',''));
			return print(self::General($sample));
		}
	}	
		

	//Генерирует основной шаблон
	public static function General($var)
	{
		$file = 'html/v_general-pattern.html';
		foreach($var as $k => $v) {
			$$k = $v;
		}
		
		/*if(!empty($include_page)) {
			ob_start();
			include $include_page;
			if(isset($switch_pattern) && $switch_pattern == true) {
				$search_string = ob_get_clean();
			} /*else {
				$result_page = ob_get_clean();
			}
		}*/
		
		
		ob_start();
		include $file;
		return ob_get_clean();
	}
	
}
?>