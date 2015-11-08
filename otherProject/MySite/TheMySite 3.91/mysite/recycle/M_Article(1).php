<?php

//Подгружает форму для ввода статей
class M_Article extends C_Page
{
	public function __construct()
	{
		parent::__construct();
		
		if(self::$human == 'Добавить')
		{
			self::AddPage();
			/*isset($this->article) ? '' : $this->article = NULL;
			$this->button = 'create';
			$this->v_button = 'Создать';
			$this->aId = NULL;
			$add = new M_Query(array('someValue'));
			$add-> SelectAll();
			ob_start();
			include 'html/v_add_category.html';
			$this->search_string = ob_get_clean();*/
		}
		else
		{
			$uForm = new M_Query(array($this->get_iden));
			$uForm = $uForm->UpdateForm();
			self::$findIt = new M_GlueOnce($uForm);
			isset(self::$findIt->article) ? $this->article = self::$findIt->article : $this->article = NULL;
			$this->title = self::$findIt->title;
			isset(self::$findIt->aId) ? $this->aId = self::$findIt->aId : $this->aId = NULL;
			$this->button = 'update';
			$this->v_button = 'Изменить';
		}
		ob_start();
		include('html/v_nav_panel.html');
		$this->navPanel = ob_get_clean();
		ob_start();
		include 'html/v_html-form.html';
		$this->result_page = ob_get_clean();
		$this->main_title = 'Добавить';
		$this->menu_list = 'Статья';
	}
	
	private function AddPage()
	{
		isset($this->article) ? '' : $this->article = NULL;
		$this->button = 'create';
		$this->v_button = 'Создать';
		$this->aId = NULL;
		$add = new M_Query(array('someValue'));
		$add-> SelectAll();
		ob_start();
		include 'html/v_add_category.html';
		$this->search_string = ob_get_clean();
		$category = new M_Query(array('someValue'));
		$any = ['*', 'themes', '', '1>0', 'tId ASC', '100'];
		$category = $category->Select($any);
		
		for($i = 0, $f = ''; $i < count($category); $i++) {
			$s = '<label>%s <input type="radio" name="theme" value="%s"></label>';
			$s = sprintf($s, $category[$i]['name'], $category[$i]['tId']);
			$f .= $s;		
		}
		$this->categories = $f;
	}
}
?>