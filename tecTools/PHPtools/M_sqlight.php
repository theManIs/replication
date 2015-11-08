<?php 
class M_query
{
	private $LBC;
	public function __construct()
	{
		try
		{
			$this->LBC = MLiteConnect::Instance();
		} catch(PDOException $e) {
			exit($e->getMessage().' '.$e->getTraceAsString());
		}
	}
	public function Insert($SQL, $params = NULL)
	{
		$liteS = $this->LBC->prepare($SQL);
		if (isset($params[0])) $liteS->bindValue(1, $params[0], SQLITE3_TEXT);
		if (isset($params[1])) $liteS->bindValue(2, $params[1], SQLITE3_TEXT);
		$liteR = $liteS->execute();
		return $this->LBC->lastInsertRowID();
	}
	public function Select($SQL, $params = NULL)
	{
		$liteS = $this->LBC->prepare($SQL);
		if (isset($params[0])) $liteS->bindValue(1, $params[0], SQLITE3_TEXT);
		if (isset($params[1])) $liteS->bindValue(2, $params[1], SQLITE3_TEXT);
		$liteR = $liteS->execute();
		return $liteR->fetchArray(SQLITE3_ASSOC);
	}
}

?>