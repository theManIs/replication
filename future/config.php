<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors','0');
setlocale(LC_ALL, "ru_RU.UTF-8");
mb_internal_encoding("UTF-8");
mb_http_output('UTF-8');
$hour = new DateTime('now + 4 hour');

function __autoload($name) 
{
	include_once($name.'.php');
}

define('HOST', 'localhost');
define('DB', 'future');
define('USER', 'moderator');
define('PASSWORD', 'somepass');
?>