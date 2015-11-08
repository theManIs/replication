<?php

//Генерация основного шаблона
abstract class GeneralPattern extends Base
{
	//Генерация основного шаблона
	public static function General($var)
	{
		$file = 'html/general-pattern.html';
		$style = 'http://www.'.$_SERVER['HTTP_HOST'].'/mysite/css/style.css';
		foreach($var as $k => $v) {
			$$k = $v;
		}
		if(!empty($include_page)) {
			ob_start();
			include $include_page;
			if(isset($switch_pattern) && $switch_pattern == true) {
				$search_string = ob_get_clean();
			} else {
				$result_page = ob_get_clean();
			}
		}

		ob_start();
		include $file;
		return ob_get_clean();
	}
}


?>