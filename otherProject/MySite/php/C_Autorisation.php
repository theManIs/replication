<?php

//Контроллер страницы авторизации
class C_Autorisation
{
	public function __construct($switch)
	{
		$switch == 'A' ? self::Stencil() : '';
		$switch == 'R' ? self::Registration() : '';
	}
	
	//Страница авторизации пользователя
	private function Stencil()
	{
		//Инициализирует переменные
		$variables = array('login', 'password', 'first', 'second', 'wrong');
		foreach($variables as $k => $v) $$v = NULL;
		
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		$show = $_SERVER['REMOTE_ADDR'];
		
		ob_start();
		include 'html/v_autorisation.html';
		$stencil = ob_get_clean();
		exit($stencil);
	}
	
	//Страница регистрации пользователя
	private function Registration()
	{
		
		//Инициализирует переменные
		$variables = array('login', 'password', 'repeat', 'email', 'mobile',
		'first', 'second', 'third', 'fourth', 'fifth', 'isSet');
		foreach($variables as $k => $v) $$v = NULL;
		
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		
		ob_start();
		include 'html/v_registration.html';
		$stencil = ob_get_clean();
		exit($stencil);
	}

	//Инициирует авторизацию и все необходимые проверки
	public static function Authorize()
	{
		//Распаковывает переменные
		foreach($GLOBALS as $k => $v) {if(!is_array($v)) $$k = $v;}
		
		
		//Удаляет устаревшие записи сессий старше 30мин
		$del = new M_Query(array('someValue'));
		$del->DeleteSession();
		
		//Проверяет заполнение формы и регистрирует пользователя
		if(isset($registration) && $registration == 'Да')
		{  
			$eLogin = new M_Query(array($login));
			if(empty($login))
			{ 
				$GLOBALS['first'] = 'Caution';
				$GLOBALS['isSet'] = 'Поле логина не заполненно!';
			} elseif(!empty($eLogin->ExistLogin())) {
				$GLOBALS['first'] = 'Warning';
				$GLOBALS['isSet'] = 'Такой логин уже существует!';
			} else {
				$GLOBALS['first'] = 'Success';
				if(empty($password))
				{
					$GLOBALS['second'] = 'Caution';
					$GLOBALS['isSet'] = 'Поле пароля не заполненно!';
				}
				elseif(empty($repeat))
				{
					$GLOBALS['third'] = 'Caution';
					$GLOBALS['isSet'] = 'Поле повтора не заполненно!';
				}
				elseif($repeat != $password)
				{
					$GLOBALS['third'] = 'Warning';
					$GLOBALS['second'] = 'Warning';
					$GLOBALS['isSet'] = 'Пароли не совпадают!';
				}
				else
				{
					$GLOBALS['second'] = 'Success';
					$GLOBALS['third'] = 'Success';
					if(empty($mobile))
					{
						$GLOBALS['fourth'] = 'Caution';
						$GLOBALS['isSet'] = 'Поле телефона не заполненно!';
					}
					else
					{
						$GLOBALS['fourth'] = 'Success';
						if(empty($email))
						{
							$GLOBALS['fifth'] = 'Caution';
							$GLOBALS['isSet'] = 'Поле почты не заполненно!';
						}
						else
						{
							$GLOBALS['fifth'] = 'Success';
							$GLOBALS['isSet'] = 'Получилось!';
							$aUser = new M_Query(
							array($login, $password, $mobile, $email));
							$aUser->AddUser();
							header('Location: ../Авторизация');
						}
					}
				}
			}
			
		}
		
		//Создаёт куки и запись сессии в базе
		if(isset($authorize) && $authorize == 'Войти')
		{ 
			if(empty($login)) 
			{
				$GLOBALS['first'] = 'Caution';
				$GLOBALS['wrong'] = 'НЕ введён логин!';
			} elseif(empty($password)) {
				$GLOBALS['second'] = 'Caution';
				$GLOBALS['first'] = 'Success';
				$GLOBALS['wrong'] = 'НЕ введён пароль!';
			} elseif(isset($ip)) {
				$any = new M_Query(array($login, $password)); 
				$userId = $any->SelectUser();
				if(empty($userId)) 
				{	
					$GLOBALS['first'] = 'Warning';
					$GLOBALS['second'] = 'Warning';
					$GLOBALS['wrong'] = 'Неправильная пара логин/пароль!';
					$page = new C_Autorisation('A');
				} else {
					$uCookie = new M_Query(array($login));
					$uCookie = $uCookie->AddSession();
					$uCookie = $uCookie[0]['uCookie'];
					setcookie('noPie', $uCookie, time()+3600*24);
					header('Location: ../gate');
				}
			}
		}
		
		//Удаляет запись куки из браузера
		if(isset($exit) && $exit == 'Выход') 
		{
			setcookie('noPie', '', time()-3600*24);
			header('Location: ../Авторизация');
		}
	
	
		
		//Проверка авторизации
		if(isset($_COOKIE['noPie']))
		{
			$cookie = htmlentities($_COOKIE['noPie']);
			$GLOBALS['cookie'] = $cookie;
			$noPie = new M_Query(array($cookie));
			$noPie = $noPie->GetUser();
			!empty($noPie) 
			? $GLOBALS['userData'] = $noPie
			: $page = new C_Autorisation('A');
		} else {
			//Выбор страницы авторизация или регистрация
			!isset($request) ? new C_Autorisation('A'):
			($request != 'Регистрация') ? $page = new C_Autorisation('A'): '';
			$request == 'Регистрация' ? $page = new C_Autorisation('R'): '';
		}
		
		//Обновляет активные сессии в базе
		$ses = new M_Query(array($GLOBALS['cookie']));
		$ses->UpdateSession();
	
	}
}

?>