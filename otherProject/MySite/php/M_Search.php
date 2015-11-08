<?php

class M_Search extends C_Base
{
	public function __construct()
	{
		$this->search = null;
		$this->page = C_Controller::$human;
		parent::__construct();
		
		if($this->page == 'Статьи')
		{
			$any = new M_Glue(C_Base::$findIt);
			$this->result_page = $any->IsM_Glue('html/v_wallpaper.html');
		} elseif($this->page == 'Удалить') 
		{
			$any = new M_GlueDelete(C_Base::$findIt);
			$this->result_page = $any->IsM_Glue('html/v_wallpaper.html');
		} elseif($this->page == 'Изменить') 
		{
			$any = new M_GlueUpdate(C_Base::$findIt);
			$this->result_page = $any->IsM_Glue('html/v_wallpaper.html');
		} elseif($this->page == 'Комментарии') 
		{
			$any = new M_GlueComments(C_Base::$findIt);
			$this->result_page = $any->IsM_Glue('html/v_wallpaper.html');
		} else
		{
			$this->page = '../Статьи';
		}
		
		ob_start();
		include 'html/v_search-string.html';
		$this->search_string = ob_get_clean();
	}
}
?>