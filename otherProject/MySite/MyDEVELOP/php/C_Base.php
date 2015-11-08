<?php

//Основной контроллер ресурса
class C_Base
{
	public static $findIt;
	//public static $human;
	public static $URI;
	
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
		if (!empty($_GET) && (count($_GET) < 2)) {
			$request = array_flip($_GET);
			$request = array_shift($request);
			$request = htmlentities($request, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8');
			if ($request === '0_node') {
				header('Location: /?1_node');
			} elseif (isset($request)) {
				self::$URI = $request;
			} else {
				header('Location: /?1_node');
			}
		} else  {
			header('Location: /?1_node');
		}
		return;
	}
	
	//Инициирует изменения в системе
	public function Before()
	{	
		extract(self::Clousers());
		
		//Добавляет список
		$C1();
		
		//Добавляет статью
		if (isset($this->ancestor, $this->article)) {
			$needle = ['&para;'];
			$replace = [''];
			$this->article = str_replace($needle, $replace, $this->article);
			if ($this->save == 'Создать') {
				if(mb_strlen($this->article) > 250)	{
					$data = [(string)$this->article, (int)$this->ancestor, '0'];
					$article = new M_Query($data);
					$article->Insert([
						'articles',	'article',
						'`title` = TRIM("\r\n" FROM LEFT(
						`article`, LOCATE("\n", `article`, 4))), 
						parent', 'AI'
					]);
					header('Location: /?' . $this->ancestor . '_node');
				}
				$_POST['article'] .= $this->article . "\r\n" . 
				'Длина должна быть больше, чем 250 символов';
			}
		}
		
		//Добавляет рубрику
		if (isset($this->ancestor, $this->catalog, $this->accept)){
			if ($this->accept == 'add') {
				$toQ = [(int)$this->ancestor, (string)$this->catalog, '0'];
				$toI = ['directories', 'parent', 'catalog', 'CHILD'];
				$folder = new M_Query($toQ);
				$folder->Insert($toI);
				header('Location: /?' . $this->ancestor . '_node');
			}
		}
		
		//Удаляет рубрику нахрен
		if (isset($this->check, $this->ok)) {
			$del = explode('_', $this->check);
			$what = array_pop($del);
			if ($what === 'node') {
				$that = array_shift($del);
				$par = ['DIRECTORIES', 'CHILD'];
				$request = new M_Query([(int)$that]);
				$request->Delete($par);
			} else {
				//Ничего
			}
		}
		
		
	}

	private function Clousers() {
		$C1 = function() {
			if (isset($this->save, $this->theName, $this->ancestor, $this->count)
			&& $this->save === 'Сохранить') {
				for($i = 1, $c = $this->count, $row = NUll; $i < $c; $i++) {
					$t = 't' . $i; $delimiter = '~';
					$row .= $this->$t . $delimiter;
				}
				$ask = [(string)$this->theName, (int)$this->ancestor, (string)$row];
				$give = ['ARTICLES', 'TITLE', 'PARENT', 'ARTICLE'];
				print_r($give);
				$requirement = new M_Query($ask);
				$requirement->Insert($give);
				header('Location: /?' . $this->ancestor . '_node');
			}
			
		};
		return compact('C1');
	}
}

?>