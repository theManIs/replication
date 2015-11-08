<?php

if (!isset($_COOKIE) ||
	!isset($_COOKIE['user']) ||
	$_COOKIE['user'] != loggedIn($us)) {
		header('Location: index.php');
	}

if (isset($_COOKIE) &&
	isset($_COOKIE['user']) &&
	$_COOKIE['user'] == loggedIn($us)) {
	if (isset($_POST['btt'])) {
		setcookie('user', md5(get_user($us)), time() - 3600*24);
		header('Location: index.php');
	}
}

function add_image() {
$dir = __DIR__;
if(isset($_FILES['fl']['tmp_name']) &&
	isset($_FILES['fl']['name'])) {
$ads = $_FILES['fl']['tmp_name'];
$nme = $_FILES['fl']['name'];
$create = $dir.'/'.'images'.'/'.time().'-'.$nme;
if (isset($_FILES) &&
	isset($ads)&& 
	$ads != '') {
		file_put_contents($create, file_get_contents($ads));
		$_FILES = null;
		header('Location: page.php');
}
}
}

function view_image() {
$filelist = glob("./images/*");

for($i=0, $arr = array(); $i < count($filelist); $i++) {
	$arr[$i] = '<img class="upload" src="(-:mark:-)">';
}
for($i=0; $i < count($filelist); $i++) {
	$arr[$i] = str_replace('(-:mark:-)', $filelist[$i], $arr[$i]);
}
for($i=0; $i < count($filelist); $i++) {
	echo '<div class="boxter">';
	echo $arr[$i];
	echo '<label class="labb">Удалить
	<input type="checkbox" name="del'.$i.'" value="'.$i.'"></label>
	<a href="'.$filelist[$i].'" download>Скачать</a></div>';
}
}

function del_image() {
$filelist = glob("./images/*");
for($i=0; $i < count($filelist); $i++) {
	if(isset($_POST)) {
		if(isset($_POST['del'.$i])) {
			if((int)$_POST['del'.$i] == $i) {
				unlink($filelist[$i]);
				$_POST['del'] = null;
				header('Location: page.php');
			}
		}
	}
}
}


?>