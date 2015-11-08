<?php

//Просмотр одной статьи на странице
class M_Single extends C_Page
{
	public function __construct()
	{
		$page = C_Controller::$human;
		if($page == 'Статья') 
		{
			$article = new M_Query(array($GLOBALS[0][1]));
			$sView = $article->SelectSingle();
			$rComments = new M_GlueComments($article->ReciveComments());
			$array = array('Статья', 
			'<img src="../mysite/png/notes.png">'.$sView[0]['title']); 
			$this->result_page = '<div class="text_align">'.$sView[0]['article'].
			'</div>'.$rComments->IsM_Glue('html/v_comments.html');
		} else
		{
			$array = array('Главная страница', 'Cамая главная страница');
			$this->result_page = '<h1 class="enter">Добро пожаловать!</h1>';
		}
		parent::__construct($array);
	}
}
?>