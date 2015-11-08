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
		if (isset($this->ancestor, $this->article, $this->iden)) {
			if ($this->save == 'Создать') {
				if(mb_strlen($this->article) > 250)	{
					$data = [$this->article, $this->ancestor, 'DEFAULT'];
					$article = new M_Query($data);
					$article->Insert([
						'articles', 
						'article',
						'`title` = TRIM("\r\n" FROM LEFT(`article`, LOCATE("\n", `article`, 4))), 
						parent', 
						'aId'
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
				$toQ = [$this->ancestor, $this->catalog, 'DEFAULT'];
				$toI = ['directories', 'parent', 'catalog', 'iDir'];
				$folder = new M_Query($toQ);
				$folder->Insert($toI);
				header('Location: /Cтатьи/' . $this->ancestor . '.node');
			}
		}
		
		
		//Удаляет статью
		if(isset($this->delete, $this->iden) && $this->delete == 'Удалить')
		{
			$delete = new M_Query(array($this->iden));
			$delete = $delete->ConfirmDelete();
		}
		//Изменяет уже существующую статью
		elseif(
			isset($this->update, $this->iden, $this->article) 
			&& $this->update == 'Изменить'
			)
		{
			$cUpdate = new M_Query(array($this->article, $this->iden));
			$cUpdate = $cUpdate->ConfirmUpdate();
			header('Location: ../Статьи');
		}
		//Добавляет комментарий
		elseif(isset($this->comments, $this->iden, $this->textInfo) 
		&& $this->comments == 'Оставить' && $this->textInfo != '')
		{
			$comments = new M_Query(array($this->iden, $this->textInfo));
			if ($comments->ConfirmComments()) exit('Ошибка доступа');
		}
		elseif(isset($this->delCom, $this->iden) && $this->delCom == 'Избавиться')
		{	//Удаляет комментарий
			$delCom = new M_Query(array($this->iden));
			$delCom = $delCom->DelComments();
		} elseif (isset($this->category, $this->accept)) {
			if ($this->accept == 'add') {
			//Добавляет рубрику
			$category = new M_Query(['someValue']);
			$insert = ['themes', '`name` = \'' . $this->category . '\''];
			$lastInsert = $category->Insert($insert);
			header('Location: /' . self::$human);
			} elseif ($this->accept == 'delete') {
			//Удаляет рубрику
			$category = new M_Query(['someValue']);
			$category->Delete(['themes', '`name` = \'' . $this->category . '\'']);
			header('Location: /' . self::$human);
			}
		}
	}

}

?>