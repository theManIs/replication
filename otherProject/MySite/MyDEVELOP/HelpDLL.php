<?php
final abstract class HelpDLL()
{
	//Генерирует случайную строку
	public function SRand($len, $alphabet = 'qwertyuiopasdfghjklzxcvbnm0987654321') 
	{
		for ($i = 0, $r = NULL, $r =& $random; $i < $len; $i++) 
			$r .= $alphabet[mt_rand(0, strlen($alphabet)-1)];
		return $random;
	}
}
?>