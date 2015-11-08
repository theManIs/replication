<?php
class V_easyTable
{
	public function __construct($aim)
	{
		$this->aim = $aim;
		$this->table = '<table>';
	}

	public function tHead($cols = array())
	{
		$thead = '<tr>';
		foreach ($cols as $v) {
			$thead .= '<th>' . $v;
		}
		$this->table .= $thead; 
	}
	
	public function tCaption($caption)
	{
		$this->table .= '<caption>' . $caption . '</caption>';
	}
	
	public function getHTML()
	{
		ob_start();
		echo $this->table;
		return ob_get_clean();
	}
	
	public function tBody($column = array())
	{
		
		foreach($this->aim as $v) {
			$this->table .= '<tr>';
			for($i = 0, $f = count($column); $i < $f; $i++) {
				if (is_int($column[$i]) && $column[$i] < $f) {
					$this->table .= '<td>' . $v[$column[$i]];
				} elseif (is_string($column[$i])) {
					$this->table .= '<td>' . $column[$i];
				} elseif (is_array($column[$i])) {
					exit('Нельзя передавать в таблицу массив!');
				}
			}
		}
		$this->table .= '</table>';
	}
}
?>