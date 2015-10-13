<?php 
class M_query
{
	private $pdo;
	public $params = array();
	
	public function __construct($pdo)
	{
		try	{
			$this->pdo = $pdo;
		} catch(PDOException $e) {
			exit($e->getMessage().' '.$e->getTraceAsString());
		}
	}
	
	public function getArray()
	{
		try {
			$sql = $this->find . $this->from;
			if (isset($this->where)) $sql .= $this->where . ';';
			$ask = $this->pdo->prepare($sql);
			if (C_base::whatIsIt('a', $this->params)) {
				for ($i = 0, $c = count($this->params); $i < $c; $i++) {
					$ask->bindValue(($i + 1), $this->params[$i]);
				}
			}
			$ask->execute();
			$ask = $ask->fetchAll();
			return $ask;
		} catch(PDOException $e) {
			exit($e->getMessage().' '.$e->getTraceAsString());
		}
	}
	
	public function from($from)
	{
		$this->from = ' FROM ' . $from;
	}
	
	public function select($select)
	{
		$this->find = 'SELECT ' . $select;
	}
	
	public function where()
	{
		$this->where = ' WHERE ';
		for($i = 0, $c = func_num_args(); $i < $c; $i++) {
			$this->where .= func_get_arg($i) . ' = ?';
			if (($i + 1) < $c) $this->where .= ' AND ';
		}
	}
	
	public function bind()
	{
		for($i = 0, $c = func_num_args(); $i < $c; $i++) {
			$this->params[] = func_get_arg($i);
		}
	}
}

?>