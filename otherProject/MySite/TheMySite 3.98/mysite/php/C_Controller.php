<?php
//Выбирает решение
abstract class C_Controller
{	
	//Функция очереди исполнения запросов
	public static function Request()
	{
		//Создаём базовые объекты
		$B = new C_Base();
		$A = new C_Autorisation();
		$E = new C_ErrorHandler();
		
		//Обработка ЧПУ
		$B->HumanURI();
		
		//Авторизация
		$A->Authorize();
		
		//Проверка первоочередных действий
		$B->Before();
		
		//Генерация основного шаблона
		C_Page::SwitchPage();
	}
}


?>