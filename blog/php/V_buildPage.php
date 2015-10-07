<?php
class V_buildPage extends C_base
{
	public function getPage(){
		parent::initialize(['reference']);
		switch($this->reference) {
			case 'default':
				self::write();
				break;
			case 'redact':
				self::redact();
				break;
			case 'update':
				self::update();
				break;
			case 'toPrint':
				self::toPrint();
				break;
			default:
				header('Location: /blog/?reference=toPrint');
		}
	}
	
	private function write()
	{
		$inc = file_get_contents('html/add.html');
		include 'html/header.html';
	}
	
	private function redact()
	{
		$tmp = M_manageDocument::$scalar;
		ob_start();
		include 'html/redact.html';
		$inc = ob_get_clean();
		include 'html/header.html';
	}
	
	private function update()
	{
		$tmp = M_manageDocument::$transport;
		ob_start();
		include 'html/update.html';
		$inc = ob_get_clean();
		include 'html/header.html';
	}
	
	private function toPrint()
	{
		$tmp = M_manageDocument::$scalar;
		ob_start();
		include 'html/toPrint.html';
		$inc = ob_get_clean();
		include 'html/header.html';
	}
}
?>