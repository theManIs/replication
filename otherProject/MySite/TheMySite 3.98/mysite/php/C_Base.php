<?php

//Основной контроллер ресурса
class C_Base
{
	public static $findIt;
	public static $human;
	public static $URI = array();
	
	public function __construct()
	{ 
		foreach($_POST as $k => $v) 
		{ 
			$v = htmlentities($v, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
			$this->$k = $v;
		}
	}
	
	public function __set($var, $val)
	{
		$this->$var = $val;
	}
	
	//Обработка ЧПУ
	public function HumanURI()
	{
		if (!empty($_GET['request'])) {
			$request = htmlentities($_GET['request'], ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
			$request = explode('/', $request);
			$request = array_filter($request);
			self::$human = $request[0];
			if (count($request) > 3) return exit('Ошибка');
			if (isset($request[2])) {
				self::$URI = ['article', $request[2]];
			} elseif (isset($request[1])) {
				self::$URI = $request[1];
			} else {
				self::$URI = '1.node';
			}
		} else  {
			header('Location: /Статьи/');
		}
		return;
	}
	
	//Инициирует изменения в системе
	public function Before()
	{
		//Добавляет статью
		if (isset($this->ancestor, $this->article)) {
			$needle = ['&para;'];
			$replace = [''];
			$this->article = str_replace($needle, $replace, $this->article);
			if ($this->save == 'Создать') {
				if(mb_strlen($this->article) > 250)	{
					$data = [(string)$this->article, (int)$this->ancestor, 'DEFAULT'];
					$article = new M_Query($data);
					$article->Insert([
						'articles',	'article',
						'`title` = TRIM("\r\n" FROM LEFT(
						`article`, LOCATE("\n", `article`, 4))), 
						parent', 'aId'
					]);
					header('Location: /Cтатьи/' . $this->ancestor . '.node');
				}
				$this->article .= $this->article . "\r\n" . 
				'Длина должна быть больше, чем 250 символов';
			}
		}
		
		//Добавляет рубрику
		if (isset($this->ancestor, $this->catalog, $this->accept)){
			if ($this->accept == 'add') {
				$toQ = [(int)$this->ancestor, (string)$this->catalog, 'DEFAULT'];
				$toI = ['directories', 'parent', 'catalog', 'iDir'];
				$folder = new M_Query($toQ);
				$folder->Insert($toI);
				header('Location: /Cтатьи/' . $this->ancestor . '.node');
			}
		}
	}

}

?>