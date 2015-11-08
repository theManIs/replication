<?php

function GetFiles($k, &$b, &$g) {
	$q = '\*';
	$f = glob($k . $q);
	for($i = 0; $i < count($f); $i++) {
		if(is_dir($f[$i])) {
			$g[] = $f[$i];
			GetFiles($f[$i], $b, $g);
			
		}
		if(!is_dir($f[$i])) $b[] = $f[$i];
	}
}

function TakeFiles() {
	$c = 0.00;
	$g = [];
	$r = [];
	$k = 'c:\xampp\htdocs\mysite';
	$t = 'c:\xampp\mysql\data\db';
	$u = 'c:\xampp\htdocs\.htaccess';
	$ab = 'c:\PHP\SaveCredits.php';
	$php = 'c:\PHP\php.ini';
	$as = [$u, $ab, $php];
	GetFiles($k, $r, $g); 
	GetFiles($t, $r, $g);
	$d = function ($v, $k) use (&$c) {$c += filesize($v);};
	array_walk($r, $d); 
	$m = function(&$c) {$c = substr((string)($c/1024/1024), 0, 4) . ' Мегабайт';};
	$m($c);
	$j = [$r, $g, $k, $t, $c, $as]; 
	return $j;
}

function MakeDirectory() {
	$y = 'c:\Libruary\W.W.W\archive';
	$h = '\TheMySite ';
	$w = function(&$v, $k) {$v = floatval(substr($v, -4));};
	$a = glob($y . '\*');
	array_walk($a, $w);
	$a = array_filter($a);	
	arsort($a);
	$a = array_shift($a);
	$l = $y . $h . ((float)$a+0.01);
	if(!is_dir($l)) {
		mkdir($l);
	} else {
		$l = $l . '.01';
		mkdir($l);
	}
	return $l;
}

function NewDirectory() {
	$z = TakeFiles();
	$l = MakeDirectory();
	$af = $z;
	$ac = ['\mysite', '\db', '\htdocs', '\PHP'];
	$ad = function ($v, $k) use ($l) {mkdir($l . $v);};
	array_walk($ac, $ad);
	file_put_contents($l . '\Size.txt', $z[4]);
	$o = function (&$v, $k) use ($z, $l) {
		$v = str_replace($z[2], $l . '\mysite', $v);
		$v = str_replace($z[3], $l . '\db', $v);
		$v = str_replace($z[5][1], $l . '\PHP\SaveCredits.php', $v);
		$v = str_replace($z[5][0], $l . '\htdocs\.htaccess', $v);
		$v = str_replace($z[5][2], $l . '\PHP\php.ini', $v);
	};
	array_walk($z[0], $o);
	array_walk($z[1], $o);
	array_walk($z[5], $o);
	$aa = function($v, $k) {mkdir($v);};
	array_walk($z[1], $aa);
	return $ag = [array_merge($af[0], $af[5]), array_merge($z[0], $z[5])];
}

function FinalCopy() {
	$aj = NewDirectory();
	for($i = 0; $i < count($aj[1]); $i++) copy($aj[0][$i], $aj[1][$i]);	
}

FinalCopy();
?>