<?php
class M_tableCreate
{
	public function __construct($pattern)
	{
		$notes = glob($pattern);
		$this->notes = $notes;
	}
	
	public function tHead($cols = array())
	{
		$thead = '<tr>';
		foreach ($cols as $v) {
			$thead .= '<th>' . $v;
		}
		$this->thead = $thead; 
	}
	
	public function getHTML()
	{
		ob_start();
		echo $this->listen;
		return ob_get_clean();
	}
	
	public function createTable($caption)
	{
		$notes = $this->notes;
		$listen = '<table>' . $this->thead;
		foreach($notes as $v) {
			$line = json_decode(file_get_contents($v));
			$listen .= '<tr><td>' . $line[0] . '<td>' . $line[3] . '<td>' . $line[1];
			$listen .= '<td>' . $this->col4;
			$listen .= '<td>' . $this->col5;
		}
		$listen .= '<caption>' . $caption . '</caption></table>';
		$this->listen = $listen;
	}
	
	public function colPush()
	{
		$this->col4 = '<button name="delete" value="delete"
			form="deleteForm" type="submit">Удалить</button>';
		$this->col5 = '<button name="update" value="update"
			form="updateForm" type="submit">Редактировать</button>';
	}
}
?>