<?php
class M_magic
}
	//Попытка обратиться к несуществующему свойству
	public function __get($name)
	{
		$class_vars = NULL;
		foreach(get_class_vars(get_called_class()) as $k => $v)
			$class_vars .= $k.', ';
		$class_vars = substr($class_vars, 0, strlen($class_vars)-2);
		$error = new C_Errors(array('Ошибка обращения к свойству',
		'Несуществующее свойство: ', $name,
		'Ошибка вызвана из класса: '.get_called_class(),
		'А вот какие свойства есть: ', $class_vars)); 
		$error->EchoError();
	}
	
	//Попытка установить несуществующее свойство
	public function __set($name, $value)
	{
		$class_vars = NULL;
		foreach(get_class_vars(get_called_class()) as $k => $v)
			$class_vars .= $k.', ';
		$class_vars = substr($class_vars, 0, strlen($class_vars)-2);
		is_array($value) ? $value=implode(', ',$value) : $value=$value;
		$error = new C_Errors(array('Ошибка установки свойства',
		'Несуществующее свойство: ', $name,
		'Ошибка вызвана из класса: '.get_called_class(),
		'Пытались присвоить: <span class="GreyText">'.$value.'</span>', '<br>
		<span class="BlackText">А вот какие свойства есть:</span> '.$class_vars)); 
		$error->EchoError();
	}
	
	public function __call($name, $value)
	{
		$class_methods = NULL;
		foreach(get_class_methods(get_called_class()) as $k => $v)
			$class_methods .= $v.', ';
		$class_methods = substr($class_methods, 0, strlen($class_methods)-2);
		is_array($value) ? $value=implode(', ',$value) : $value=$value;
		$error = new C_Errors(array('Ошибка обращения к методу',
		'Несуществующий метод: ', $name,
		'Ошибка вызвана из класса: '.get_called_class(),
		'Передали аргументы: <span class="GreyText">'.$value.'</span>', '<br>
		<span class="BlackText">А вот какие методы есть:</span> '.$class_methods)); 
		$error->EchoError();
	}
}