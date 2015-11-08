<?php

//Представляет одну статью
class M_GlueOnce extends M_Glue
{
	public $title;
	public $theme;
	public $articles;
	public $identify;
	
	public function __construct($param) 
	{
		foreach($param['0'] as $key => $value) 
		{
			$this->$key = $value;
		}
	}
}


?>