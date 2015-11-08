<?php

//Контроллер страницы авторизации
class C_Autorisation extends C_Base
{
	public function __construct()
	{
		//Инициализация переменных
		$variables = array('login', 'first', 'second', 'wrong', 'password', 
			'repeat', 'email', 'mobile', 'third', 'fourth', 'fifth', 'isSets');
		foreach($variables as $k => $v) $this->$v = NULL;
		$this->show = $_SERVER['REMOTE_ADDR'];
		parent::__construct();
		$this->style = file_get_contents('../MySITE/css/autorisationStyle.css');
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
					$this->second = 'Success';
					$this->isSets = 'Поле повтора не заполненно!';
				} else	{
						$u = new M_Query([$this->login, $this->password, '0']);
						$u->Insert(['USERS', 'ULOGIN', 'UPASSWORD', 'UI']);
						header('Location: /?Авторизация');
				}
			}
		}
		
		//Создаёт куки, запись сессии в базе и проверяет заполнение формы
		if(isset($this->authorize) && $this->authorize == 'Войти')
		{ 
			if(empty($this->login)) {
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
				$any = new M_Query([$this->password, '0>1']); 
				$any = $any->Select(['*', 'USERS', 
					'`ULOGIN` = \'' . $this->login . '\' AND UPASSWORD', 'UI']);
					
				if(empty($any)) 
				{	
					$this->first = 'Warning';
					$this->second = 'Warning';
					$this->wrong = 'Неправильная пара логин/пароль!';
				} else {
					
					$t = [$this->login, '0', $_SERVER['REMOTE_ADDR']];
					$uCookie = new M_Query($t);
					$k = ['SESSIONS', 'ULOGIN', 'SI', 
						'UCOOKIE = \'' . self::SRand(40) . '\', 
						FINISH = NOW(), START = NOW(), ADDRESS'];
					$uCookie = $uCookie->Insert($k);
					$g = new M_Query(['1<0', '1<0']);
					$g = $g->Select(['*', 'SESSIONS', 'SI = last_insert_id() OR SI', 'SI']);
					$g = $g[0]['UCOOKIE'];
					setcookie('noPie', $g, time()+3600*24);
					header('Location: /?'); 
				}
			}
		}
		
		//Удаляет запись куки из браузера
		if(isset($this->quit) && $this->quit === 'Выход') 
		{	
			setcookie('noPie', '', time()-3600*24);
			header('Location: /?Авторизация');
		}
	
	
		
		//Проверка авторизации
		if(isset($_COOKIE['noPie']))
		{
			$cookie = htmlentities($_COOKIE['noPie']);
			$noPie = new M_Query(['0>1', '0>1']);
			$noPie = $noPie->Select(['UI, ULOGIN', 'USERS', 'UI', 'ULOGIN = 
				(SELECT ULOGIN FROM SESSIONS WHERE `UCOOKIE` = \'' . $cookie . '\') OR UI']);
			
			if(!empty($noPie)) {
				C_Page::$userData = $noPie;
				$ses = new M_Query(array($cookie));
				$ses->UpdateSession();
			} else {
				exit(include '../MySITE/html/v_autorisation.html');
			}
		} 
		else
		{
			self::$URI == 'Регистрация' 
			? exit(include '../MySITE/html/v_registration.html') 
			: exit(include '../MySITE/html/v_autorisation.html');
		}
	}
	
	private function SRand($len, $alphabet = 'qwertyuiopasdfghjklzxcvbnm0987654321') 
	{
		for ($i = 0, $r = NULL, $r =& $random; $i < $len; $i++) 
			$r .= $alphabet[mt_rand(0, strlen($alphabet)-1)];
		return $random;
	}
}

?>