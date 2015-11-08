<?php
class M_beforePrint extends C_base 
{
	public function returnNote() 
	{
		parent::initialize(['head', 'body', 'author', 'add', 'delete', 'update', 'reference']);
		$manage = new M_manageDocument();
		if (self::testVarS([$this->head, $this->body, $this->author, $this->add])) {
			$manage->add();
		}
		if (isset($this->delete)) {
			$manage->del($this->delete);
		}
		if (isset($this->update)) {
			$manage->update($this->update);
		}
		if (self::testVarS([$this->reference]) && $this->reference === 'toPrint') {
			$manage->toPrint();
		}
		if (self::testVarS([$this->reference]) && $this->reference === 'redact') {
			$manage->redact();
		}
	}
	
	public function testVarS($arVar = array())
	{
		foreach($arVar as $v) {
			if (!empty($v) && is_string($v) && trim($v) != false) {
				continue;
			} else {
				return false;
			}
		}
		return true;
	}
}
?>