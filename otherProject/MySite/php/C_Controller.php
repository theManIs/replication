<?php
//Выбирает решение
abstract class C_Controller
{
	public static $human;
	
	//Функция очереди исполнения запросов
	public static function Request()
	{
		//Создаём базовый объект
		$Base = new C_Base();
		
		//Обработка ЧПУ
		self::$human = $Base->HumanURI();
		
		//Обработка переменных $_REQUEST
		$Base->RequestVariables();
		
		//Авторизация
		C_Autorisation::Authorize();
		
		//Проверка первоочередных действий
		$Base->Before();
		
		//Генерация основного шаблона
		C_Page::SwitchPage(self::$human);
	}
}


?>