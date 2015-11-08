<?php

//Просмотр одной статьи на странице
class M_Single extends C_Page
{
	public function __construct()
	{
		$page = self::$human;
		if($page == 'Статья') 
		{
			$article = new M_Query(array(self::$parth));
			$sView = $article->SelectSingle();
			$this->aId = $sView[0]['aId'];
			$rComments = new M_GlueComments($article->ReciveComments());
			$array = array('Статья', 
			'<img src="../mysite/png/notes.png">'.$sView[0]['title']); 
			$parsedown = new M_Parsedown();
			$str = $parsedown->parse($sView[0]['article']);
			
			/*ob_start();
			include '../mysite/html/v_paper.html';
			$str .= ob_get_clean();*/
			//$needle = array("\r\n", '_b_', '_b/', '_a_', '_a/');
			//$replace = array('<br>', '<b>', '</b>', '<a href="#">', '</a>');
			//$str = str_replace($needle, $replace, $sView[0]['article']);
			
			$this->result_page = '<div class="text_align Article">'.$str.
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