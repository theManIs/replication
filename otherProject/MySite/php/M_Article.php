<?php

//Подгружает форму для ввода статей
class M_Article extends C_Page
{
	public function __construct($array)
	{
		parent::__construct($array);
		
		ob_start();
		include 'html/v_html-form.html';
		$this->result_page = ob_get_clean();
	}
}
?>