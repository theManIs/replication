<?php
class M_manageDocument extends C_base 
{
	static $transport = array();
	static $scalar = null;
	public function add() 
	{
		$newNote = array();
		list($newNote[1], $newNote[2], $newNote[3], $newNote[0], $newNote[4]) = 
			[$this->head, $this->body, $this->author, date('d-n-y(H:i:s)'), time()];
		ksort($newNote);
		(new M_dataBase())->newFile($newNote);
		header('Location: /blog?reference=redact');
	}
	
	public function del($descriptor)
	{
		$path = __DIR__ . '/../notes/' . $descriptor . '.txt';
		if(is_file($path)) if(!unlink($path)) die('Ничего не работает!');
	}
	
	public function update($descriptor)
	{
		$path = __DIR__ . '/../notes/' . $descriptor . '.txt';
		if (is_file($path)) {
			$file = json_decode(file_get_contents($path));
		}
		self::$transport = $file;
	}
	
	public function toPrint()
	{
		
		self::$scalar = V_requestHTML::blockDoc();
	}
	
	public function redact()
	{
		$col4 = '<button name="delete" value="delete" class="btn btn-danger"
			form="deleteForm" type="submit">Удалить</button>';
		$col5 = '<button name="update" value="update" class="btn btn-warning"
			form="updateForm" type="submit">Редактировать</button>';
		$data = (new M_dataBase())->getData('notes/*');
		$eTable = new V_easyTable($data);
		$eTable->tCaption('Статьи доступные для редактирования и удаления');
		$eTable->tHead(['Дата и время', 'Название', 'Автор', 'Удалить', 'Редактировать']);
		$eTable->tBody([0, 1, 3, $col4, $col5, 4]);
		
		self::$scalar = $eTable->getHTML();
	}
}
?>
