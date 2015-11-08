<?php

//Инициация удаления, добавления, редактирования
abstract class Iniciation extends Base
{
	public static function GoIniciation()
	{
		foreach($GLOBALS as $k => $v) $$k = $v;
		if(isset($delete) && $delete == 'Удалить' && !empty($iden)) 
			Query::ConfirmDelete($iden);
		if(isset($create) && $create == 'Создать' && 
		!empty($title) && !empty($articals) && !empty($theme)) 
		{
			Query::AddArticle($title, $articals, $theme);
			header('Location: articles');
		}
		if(isset($update) && $update == 'Изменить' && !empty($iden))
		{
			Query::ConfirmUpdate($title, $theme, $articals, $iden);
			header('Location: articles');
		}
		if(isset($comments) && $comments == 'Оставить' && 
		!empty($iden) && !empty($textInfo) && $textInfo != '')
		{
			Query::ConfirmComments($iden, $textInfo);
		}
		if(isset($delCom) && $delCom == 'Избавиться' && !empty($iden))
		{
			Query::DelComments($iden);
		}
	}
}

?>