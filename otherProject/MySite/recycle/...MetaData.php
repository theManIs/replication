<?php

//Cообщает мета данные для страницы
class MetaData extends Base 
{
	public static function SwitchPage()
	{
		//Подготовка переменных к работе
		foreach($GLOBALS as $k => $v) $$k = $v;
		
		//Обнуление переменных
		isset($search) ? '' : $search = '';
		if(empty($title) && empty($theme) && empty($articals))
		{
			$title = ''; $theme = ''; $articals = '';
		}
		
		//Получение версий среды разработки
		$php = phpversion();
		$mySQL = Query::GetVersion();
		$apache = $_SERVER['SERVER_SOFTWARE'];
		
		//Обработка ЧПУ
		if(empty($request)) 
		{
			$request = '';
			$page = '';
		} else {
			$meta = explode("/", $request);
			foreach($meta as $key => $into) 
			{
				if($into == '') unset($meta[$key]);
			}
			$page = $meta['0'];
			if(isset($meta['1'])) $article = $meta['1'];
		}
		
		//Выбор страницы массива и данных для заполнения
		switch($page) {
			//Главная страница
			default:
				$massive = array(
				'main_title' => 'Главная страница',
				'menu_list' => 'Cамая главная страница',
				'result_page' => '<h1 class="enter">Добро пожаловать!</h1>',
				'include_page' => 'html/search-string.html',
				'search' => $search,
				'switch_pattern' => true, 'apache' => $apache,
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Страница со статьями
			case 'articles':
				$selectAll = new Glue(Query::SelectAll());
				$massive = array(
				'main_title' => 'Статьи',
				'menu_list' => 'Все статьи в блоге',
				'result_page' => $selectAll->IsGlue('html/wallpaper.html'),
				'search_string' => '', 'apache' => $apache,
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Страница поиска по статьям
			case 'search':
				$selectSearch = new GlueSearch(Query::SelectSearch($search));
				$massive = array(
				'main_title' => 'Поиск по блогу',
				'menu_list' => 'Результаты поиска',
				'result_page' => $selectSearch->IsGlue('html/wallpaper.html'),
				'include_page' => 'html/search-string.html',
				'search' => $search,
				'switch_pattern' => true, 'apache' => $apache,
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Просмотр одной статьи
			case 'article':
				$singleView = new GlueOnce(Query::SelectSingle($article));
				$reciveComments = new GetComments(Query::ReciveComments($article));
				$massive = array(
				'main_title' => $singleView->theme,
				'menu_list' => '<img src="http://localhost/png/notes.png">
				'.$singleView->title,
				'result_page' => '<div class="text_align">'.$singleView->articles.
				'</div>'.$reciveComments->strings,
				'include_page' => 'html/search-string.html',
				'search' => $singleView->title,
				'switch_pattern' => true, 'apache' => $apache,
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Список статей, которые можно удалить
			case 'delete': 
				$selectDelete = new GlueDelete(Query::SelectAll());
				$massive = array(
				'main_title' => 'Удаление статьи',
				'menu_list' => 'Можно удалять:',
				'result_page' => $selectDelete->IsGlue('html/wallpaper.html'),
				'search_string' => '',
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Страница создания статьи
			case 'add': 
				$massive = array(
				'main_title' => 'Увеличте базу статей',
				'menu_list' => 'Итак, статья...',
				'search' => '',
				'search_string' => '',
				'title' => $title,
				'theme' => $theme,
				'articals' => $articals,
				'button' => 'create',
				'v_button' => 'Создать',
				'include_page' => 'html/html-form.html',
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Загрузка формы для редактирования статьи
			case 'update':
				$updateForm = new GlueOnce(Query::UpdateForm($get_iden));
				$massive = array(
				'main_title' => 'Изменить статью',
				'menu_list' => 'Итак, статья...',
				'search' => '',
				'search_string' => '',
				'title' => $updateForm->title,
				'theme' => $updateForm->theme,
				'articals' => $updateForm->articals,
				'button' => 'update',
				'v_button' => 'Изменить',
				'identify' => $updateForm->identify,
				'include_page' => 'html/html-form.html',
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Список статей, которые можно изменить
			case 'change': 
				$selectUpdate = new GlueUpdate(Query::SelectAll());
				$massive = array(
				'main_title' => 'Изменить статью',
				'menu_list' => 'Можно изменить:',
				'search' => '',
				'search_string' => '',
				'result_page' => $selectUpdate->IsGlue('html/wallpaper.html'),
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
			//Список статей к которым можно оставить комментарии
			case 'comments': 
				$selectComments = new GlueComments(Query::SelectAll());
				$massive = array(
				'main_title' => 'Оставить отзыв',
				'menu_list' => 'Можно оставить отзыв о статьях:',
				'result_page' => $selectComments->IsGlue('html/wallpaper.html'),
				'search_string' => '',
				'mySQL' => $mySQL, 'php' => $php, 'nav_bar' => 'Навигация'
				);
				return $massive;
		}
	}
}


?>