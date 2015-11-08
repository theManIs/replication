<?php
//genesis
define('NUMSRC', '3');
define('SRC1', 'C:/Data/MySITE');
define('SRC2', 'C:/Data/MyHOST');
define('SRC3', 'C:/Data/MyDEVELOP');
define('DEST', 'C:/Data/MyArchive');
define('FOLDER', '/MySITE ');
define('DIR_BASE', '/MyBASE');
define('USER', 'copy');
define('PASSWORD', 'needcopy');

function MakeDirectory() {
	$files = glob(DEST . '/*');
	$files = array_filter($files, function($v) {if (is_file($v)) return true;});
	foreach ($files as &$f) $f = substr(basename($f, '.zip'), 7);
	$dir = DEST . FOLDER . (floatval(max($files))+0.01);
	if(!is_dir($dir)) {
		mkdir($dir);
	} else {
		$dir = $dir . '.01';
		mkdir($dir);
	}
	return $dir;
}
function GetFiles($k, &$b, &$g) {
	$q = '/*';
	$f = glob($k . $q);
	for($i = 0; $i < count($f); $i++) {
		if(is_dir($f[$i])) {
			$g[] = $f[$i];
			GetFiles($f[$i], $b, $g);
			
		}
		if(!is_dir($f[$i])) $b[] = $f[$i];
	}
}
function TakeAll() {
	for($i = NUMSRC, $source[] = NULL; $i > 0; $i--) {$source[] = constant('SRC' . $i);}
	$source = array_filter($source);
	sort($source);
	for($i = 0, $s = $source; $i < count($s); $i++) 
		$root[$i] = mb_substr($s[$i], 0, mb_strrpos($s[$i], '/'));
	$root = array_flip(array_count_values($root));
	$clouser1 = function ($v, $k) use (&$files, &$catalogs) {GetFiles($v, $files, $catalogs);};
	array_walk($source, $clouser1);
	$old = $files;
	$destination = MakeDirectory();
	$files = str_replace($root, $destination, $files);
	$catalogs = str_replace($root, $destination, $catalogs);
	$source = str_replace($root, $destination, $source);
	return [$source, $catalogs, $files, $old, $destination];
}
function SetCopy() {
	$all = TakeAll();
	$C1 = function($m) {for ($i = 0; $i < count($m); $i++) mkdir($m[$i]);};
	$C2 = function($a, $b) {for ($i = 0; $i < count($a); $i++) copy($b[$i], $a[$i]);};
	$C1($all[0]);
	$C1($all[1]);
	$C2($all[2], $all[3]);
	return $all[4];
}
function SaveBase() {
	$folder = SetCopy();
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', USER, PASSWORD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$show = 'SHOW TABLES;';
		$tables = $pdo->query($show); 
		$tables = $tables->fetchAll(PDO::FETCH_NUM); 
		$C1 = function ($v, $k) use (&$tbl) {$tbl[] = $v;};
		array_walk_recursive($tables, $C1);
		$dir = $folder . DIR_BASE;
		mkdir($dir); 
		$C2 = function ($v, $k) use ($dir, $pdo) {
			$query = "SELECT * INTO OUTFILE '$dir/$v.txt' FROM $v;";
			$pdo = $pdo->query($query);
		};
		array_walk($tbl, $C2);
	} catch(Exception $e) {
		//Ничего не нужно делать
	}
	return $folder;
}
function MakeArchive() {
	$target = SaveBase();
	$aim = mb_strpos($target, basename($target))+mb_strlen(basename($target)); 
	$z = new ZipArchive();
	$zip = $z->open(($target . '.zip'), ZipArchive::CREATE);
	GetFiles($target, $files, $catalogs);
	for($i = 0; $i < count($files); $i++) {
		$name = mb_substr($files[$i], $aim+1);
		$z->addFile($files[$i], $name);
	}
	$z->close();
	return $target;
}
function Run() {
	$target = MakeArchive();
	GetFiles($target, $files, $catalogs);
	if (is_array($catalogs)) rsort($catalogs);
	for($i = 0, $a = $files; $i < count($a); $i++) unlink($a[$i]);
	for($i = 0, $a = $catalogs; $i < count($a); $i++) rmdir($a[$i]);
	rmdir($target);
	echo 'Ok!';
}
$argv[1]();
?>