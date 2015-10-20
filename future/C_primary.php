<?php
class C_primary extends M_base
{
	public function __construct()
	{
		self::initialize('youName', 'youComment', 'action', 'tape');
	}
	
	public function write()
	{
		if($this->action === 'submit' && self::what('s', $this->youName, $this->youComment)) {
			$write = M_sql::con();
			$write->insert('comments')->set('content', 'name');
			$write->bind($this->youComment, $this->youName);
			$write = $write->getInsert();
		}
	}
	
	public function read()
	{
		$read = M_sql::con();
		$time = 'CONCAT(HOUR(`date`), ":",  MINUTE(`date`)) as time';
		$date = 'CONCAT(DAY(`date`), ".",  MONTH(`date`), ".", YEAR(`date`)) as date';
		$read->select("content, name, $time, $date")->from('comments')->limit('3');
		return $read->order('id DESC')->getSelect();
	}
	
	public function template($read)
	{
		$wrap = 
			'<div class="comment">
				<div>
					<span><?=$name?></span>
					<span><?=$time?></span>
					<span><?=$date?></span>
				</div>
				<div><?=$content?></div>
			</div>';
		for ($i = 0, $c = count($read); $i < $c; $i++) {
			extract($read[$i]);
			$needle = ['<?=$name?>', '<?=$time?>', '<?=$content?>', '<?=$date?>'];
			$replace = [$name, $time, $content, $date];
			$tape = str_replace($needle, $replace, $wrap);
			$this->tape .= $tape;
		}
		return $this->tape;
	}
}
?>