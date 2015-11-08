<?php
final abstract class Handler()
{
	//Генерирует случайную строку
	public function SRand($len, $alphabet = 'qwertyuiopasdfghjklzxcvbnm0987654321') 
	{
		for ($i = 0, $r = NULL, $r =& $random; $i < $len; $i++) 
			$r .= $alphabet[mt_rand(0, strlen($alphabet)-1)];
		return $random;
	}
	
	//Выбирает из взвешенного набора
	public function WRand($num, $the = array()) 
	{
		foreach ($num as $k => $v) $the = array_merge($the, array_fill(0, $v, $k));
		return $the[mt_rand(0, count($the)-1)];
	}
	
	//Выбирает из взвешенного набора, только круче
	public function FastWRand($num, $the = array())
	{
		$C1 = function($num, $score = 0) {
			foreach ($num as $k => $v) {
				$score += $v;
				yield $k => $score;
			}
		};
		$rand = mt_rand(0, array_sum($num)-1);
		foreach ($C1($num) as $k => $v) {
			if ($rand < $v) return $k;
		}
	}
	
	//Определяет длину оротодомии
	public function Ortodomia ($loc, $R = 6378.135)
	{
		for($i = 0; $i < 4; $i++) $loc[$i] = doubleval($loc[$i]*M_PI/180.0);
		$corner = sin($loc[0])*sin($loc[2]) + cos($loc[0])*cos($loc[2])*cos($loc[3]-$loc[1]);
		return $ortodomia = abs($R*acos($corner));
	}
	
	//Проверяет корректронсть возраста
	public function checkold($date) {
		$max = ($min = 18) + 104;
		if (!checkdate($date[1], $date[0], $date[2])) return false;
		$todate = sprintf("%d-%d-%d", $date[2], $date[1], $date[0]);
		$now = new DateTime(NULL, new DateTimeZone('Europe/Moscow'));
		$dt = DateTime::createFromFormat("Y-n-j|", $todate);
		$diff = $now->diff($dt);
		if ($diff->y > $max || $diff->y < $min) return false;
		return true;
	}
	
}
?>