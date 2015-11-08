<?php

//Контроллер страницы авторизации
class C_Autorisation extends C_Base
{
	public function __construct()
	{
		//Инициализация переменных
		$variables = array('login', 'first', 'second', 'wrong', 'password', 'repeat', 'email', 'mobile', 'third', 'fourth', 'fifth', 'isSets');
		foreach($variables as $k => $v) $this->$v = NULL;
		$this->show = $_SERVER['REMOTE_ADDR'];
		parent::__construct();
	}

	public function Authorize()
	{
		//Удаляет устаревшие записи сессий старше 30мин
		$del = new M_Query(array('someValue'));
		$del->DeleteSession();
		
		//Проверяет заполнение формы и регистрирует пользователя
		if(isset($this->registration) && $this->registration == 'Да')
		{  
			$eLogin = new M_Query(array($this->login));
			if(empty($this->login))
			{ 
				$this->first = 'Caution';
				$this->isSets = 'Поле логина не заполненно!';
			} elseif(!empty($eLogin->ExistLogin())) {
				$this->first = 'Warning';
				$this->isSets = 'Такой логин уже существует!';
			} else {
				$this->first = 'Success';
				if(empty($this->password))
				{
					$this->second = 'Caution';
					$this->isSets = 'Поле пароля не заполненно!';
				}
				elseif(empty($this->repeat))
				{
					$this->third = 'Caution';
					$this->isSets = 'Поле повтора не заполненно!';
				}
				elseif($this->repeat != $this->password)
				{
					$this->third = 'Warning';
					$this->second = 'Warning';
					$this->isSets = 'Пароли не совпадают!';
				}
				else
				{
					$this->second = 'Success';
					$this->third = 'Success';
					if(empty($this->mobile))
					{
						$this->fourth = 'Caution';
						$this->isSets = 'Поле телефона не заполненно!';
					}
					else
					{
						$this->fourth = 'Success';
						if(empty($this->email))
						{
							$this->fifth = 'Caution';
							$this->isSets = 'Поле почты не заполненно!';
						}
						else
						{
							$this->fifth = 'Success';
							$this->isSets = 'Получилось!';
							$aUser = new M_Query(
							array($this->login, $this->password, $this->mobile, $this->email));
							$aUser->AddUser();
							header('Location: ../Авторизация');
						}
					}
				}
			}
			
		}
		
		//Создаёт куки, запись сессии в базе и проверяет заполнение формы
		if(isset($this->authorize) && $this->authorize == 'Войти')
		{ 
			if(empty($this->login)) 
			{
				$this->first = 'Caution';
				$this->wrong = 'НЕ введён логин!';
			}
			elseif(empty($this->password)) 
			{
				$this->second = 'Caution';
				$this->first = 'Success';
				$this->wrong = 'НЕ введён пароль!';
			} 
			elseif(isset($this->ip)) 
			{
				$any = new M_Query(array($this->login, $this->password)); 
				$any = $any->SelectUser();
				if(empty($any)) 
				{	
					$this->first = 'Warning';
					$this->second = 'Warning';
					$this->wrong = 'Неправильная пара логин/пароль!';
				} else {
					$uCookie = new M_Query(array($this->login));
					$uCookie = $uCookie->AddSession();
					$uCookie = $uCookie[0]['uCookie'];
					setcookie('noPie', $uCookie, time()+3600*24);
					header('Location: ../');
				}
			}
		}
		
		//Удаляет запись куки из браузера
		if(isset($this->quit) && $this->quit == 'Выход') 
		{
			setcookie('noPie', '', time()-3600*24);
			header('Location: ../Авторизация');
		}
	
	
		
		//Проверка авторизации
		if(isset($_COOKIE['noPie']))
		{
			$cookie = htmlentities($_COOKIE['noPie']);
			$noPie = new M_Query(array($cookie));
			$noPie = $noPie->GetUser();
			if(!empty($noPie))
			{
				M_User::$userData = $noPie;
				$ses = new M_Query(array($cookie));
				$ses->UpdateSession();
			} 
			else
			{
				setcookie('noPie', '', time()-3600*24);
				header('Location: /');
			}
		} 
		else
		{
			self::$human == 'Регистрация' ? exit(include 'html/v_registration.html') : exit(include 'html/v_autorisation.html');
		}
	}
}

?>