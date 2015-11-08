
<?php

class SmallCalendar {
	private $c35 = array();
	private $info = NULL;
	private $link = array();
	
	function __construct($source) 
	{
		self::GetMonth(self::Check($source));
	}
	function Enterprise() 
	{
		$row = '<table class="TheCalendar"><tr><td colspan="7">' . date('Y');
		$row .= '<tr><td colspan="2">' . $this->link[1];
		$row .= '<td colspan="3">' . $this->info;
		$row .= '<td colspan="2">' . $this->link[0];
		$days = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
		for ($i = 0, $row .= '<tr>'; $i < 7; $i++) $row .= '<td>' . $days[$i];
		for ($i = 0; $i < 5; $i++) {
			$row .= '<tr>';
			for($ii = 0; $ii < 7; $ii++) $row .= '<td>' . $this->c35[($i*7)+$ii];
		}
		return $row .= '</table>';
	}
	private function GetMonth($m_y)
	{
		$first = new DateTime("$m_y[1]-$m_y[0]-1");
		$last = new DateTime("$m_y[1]-$m_y[0]-1 + 1 month");
		$interval = new DateInterval('P1D');
		$month = new DatePeriod($first, $interval,$last);
		self::Cells35($month, $first, $last);
		self::Extend($first, $last);
	}
	private function Check($src)
	{
		$src = isset($src['d']) ? $src['d'] : date('n-Y');
		$src = explode('-', $src);
		if (!is_numeric($src[0]) || strlen($src[0])>2) return exit('Мошенник!');
		if (!is_numeric($src[1]) || strlen($src[1])>4) return exit('Мошенник!');
		if (checkdate($src[0], 1, $src[1])) return $src;
		return [date('n'), date('Y')];
	}
	private function Extend($before, $after) 
	{
		$names = [1 => 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 
			'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
		$this->info = $names[$before->format('n')];
		$before->modify('1 month ago');
		$link = [
		'<a href="?d=' . $after->format('n-Y') . '">' . $names[$after->format('n')] . '</a>',
		'<a href="?d=' . $before->format('n-Y') . '">' . $names[$before->format('n')] . '</a>'
		];
		$this->link = $link;
	}
	private function Cells35($month, $first, $last)
	{
		$empty = $first->format('N')-1;
		for ($i = 0, $c35 = array(); $i < $empty; $i++) $c35[] = '';
		foreach ($month as $row) 
			if ($row->format('d-n-Y') == date('d-n-Y')) {
				$c35[] = '<b>' . $row->format('d') . '</b>';
			} else {
				$c35[] = $row->format('d');
			}
		$empty = 8-$last->format('N');
		for ($i = 0; $i < $empty; $i++) $c35[] = '';
		$this->c35 = $c35;
	}
	
}

?>
