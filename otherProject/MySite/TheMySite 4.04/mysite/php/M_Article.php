<?php

//Подгружает форму для ввода статей
class M_Article extends C_Page
{
	public function __construct()
	{
		$this->article = NULL;
		$this->aId = NULL;
		parent::__construct();
		self::AddPage(self::$URI);
	}
	
	private function AddPage($code)
	{
		if (!is_string($code) || empty($code)) return;
		$page = explode('.', $code);
		$page = array_shift($page);
		$code = explode('.', $code);
		$code = array_pop($code);
		if ($code == 'cEntity') {
			$this->menu_list = 'Редактор статей';
			$this->v_button = 'Создать';
			$this->ancestor = $page;
		} elseif ($code == 'cNode') {
			$this->ancestor = $page;
			$this->menu_list = 'Редактор каталогов';
		}
		
	}
}
?>