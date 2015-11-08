<?php

//Основной контроллер ресурса
class C_Base extends C_Controller
{
	public static $findIt;
	
	public function __construct()
	{
		foreach($_REQUEST as $k => $v) 
		{ 
			$v = htmlentities($v, ENT_QUOTES, 'UTF-8');
			$this->$k = $v;
		}
	}
	
	public function __set($var, $val)
	{
		$this->$var = $val;
	}

	//Обработка входящих значений
	public function RequestVariables()
	{
		foreach($_REQUEST as $k => $v) 
		{
			$v = htmlentities($v, ENT_QUOTES, 'UTF-8');
			$GLOBALS[$k] = $v; 
		}
	}
	
	//Обработка ЧПУ
	public function HumanURI()
	{
		if(!isset($_GET['request'])) return 'gate';
		$request = $GLOBALS['_GET']['request'];
		if(empty($request)) 
		{
			$page = '';
		} 
		else 
		{
			$meta = explode("/", $request);
			foreach($meta as $key => $into) 
			{
				if($into == '') unset($meta[$key]);
			}
			$page = $meta['0'];
			if(isset($meta['1'])) $GLOBALS[] = $meta;
		}
		return $page;
	}
	
	//Инициирует изменения в системе
	public function Before()
	{
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		
		//Удаляет статью
		if(isset($delete, $iden) && $delete == 'Удалить')
		{
			$delete = new M_Query(array($iden));
			$delete = $delete->ConfirmDelete();
		}
		
		//Активирует создание статьи в базе
		if(isset($create, $article) && $create == 'Создать')
		{
			$article = new M_Query(array($article));
			$article->AddArticle();
			header('Location: ../Статьи');
		}
		
		//Изменяет уже существующую статью
		if(isset($update, $iden) && $update == 'Изменить')
		{
			$cUpdate = new M_Query(array($article, $iden));
			$cUpdate = $cUpdate->ConfirmUpdate();
			header('Location: ../Статьи');
		}
		
		//Добавляет комментарий
		if(isset($comments, $iden, $textInfo) && $comments == 'Оставить'
		&& $textInfo != '')
		{
			$comments = new M_Query(array($iden, $textInfo));
			$comments->ConfirmComments();
		}
		
		//Удаляет комментарий
		if(isset($delCom, $iden) && $delCom == 'Избавиться')
		{	
			$delCom = new M_Query(array($iden));
			$delCom = $delCom->DelComments();
		}
		
		//Обработка входных значений для страниц
		if(isset($request))
		{
			//Обработка страницы "Поиск"
			if(isset($enter)) 
			{
				if(isset($search) && $search != '')
				{
					$search = '%'.$search.'%';
					$sSearch = new M_Query(array($search));
					self::$findIt = $sSearch->SelectSearch();
					$GLOBALS['sSearch'] = new M_GlueSearch(C_Base::$findIt);
					
				} else {
					$GLOBALS['sSearch'] = new M_GlueSearch(NULL);
				}
			} else 
			
			//Обработка страницы "Статьи"
			//if($request == 'Статьи')
			{
				$article = new M_Query(array('someValue'));
				self::$findIt = $article->SelectAll();
				$GLOBALS['selectAll'] = new M_Glue(C_Base::$findIt);
			}
			
			//Обработка страницы "Изменение"
			if($request == 'Изменение') 
			{
				$uForm = new M_Query(array($get_iden));
				$uForm = $uForm->UpdateForm();
				$GLOBALS['uForm'] = new M_GlueOnce($uForm);
			}
			
			/*//Обработка страницы "Изменить"
			if($request == 'Изменить') 
			{
				$sUpdate = new M_Query(array('someValue'));
				$sUpdate = $sUpdate->SelectAll();
				$GLOBALS['sUpdate'] = new M_GlueUpdate($sUpdate);
			}
			
			//Обработка страницы "Удалить"
			if($request == 'Удалить') 
			{
				$selectDelete = new M_Query('someValue');
				$selectDelete = $selectDelete->SelectAll();
				$GLOBALS['selectDelete'] = new M_GlueDelete($selectDelete);
			}
			
			//Обработка страницы "Комментарии"
			if($request == 'Комментарии') 
			{
				$sCom = new M_Query(array('someValue'));
				$sCom = $sCom->SelectAll();
				$GLOBALS['selectComments'] = new M_GlueComments($sCom);
			}*/
			
			//Обработка страницы "Статья"
			if(C_Controller::$human == 'Статья') 
			{
				
				$article = new M_Query(array($GLOBALS[0][1]));
				
				$GLOBALS['singleView'] = $article->SelectSingle();
				
				$GLOBALS['reciveComments'] = 
					new M_GlueComments($article->ReciveComments());
				//print_r($GLOBALS['singleView']); exit;
			}
		}
	}

}

?>