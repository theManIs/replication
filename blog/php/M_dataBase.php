<?php
class M_dataBase
{
	public function newFile($newNote)
	{
		$targetFile = self::createFile($newNote[4] . '.txt', __DIR__ . '/../notes', true);
		$tData = json_encode($newNote);
		file_put_contents($targetFile, $tData);
	}
	
	public function createFile($fileName, $dir = __DIR__, $reWrite = false) 
	{
		$newName = $dir . '/' . $fileName;
		if (file_exists($newName)) {
			if (true === $reWrite) {
				unlink($newName);
				self::createFile($fileName, $dir, $reWrite);
			}
		} else {
			$oldName = tempnam($dir, '');
			rename($oldName, $newName);
		}
		return $newName;
	}
	
	public function getData($pattern)
	{
		$notes = glob($pattern);
		$blogNotes = array();
		foreach($notes as $v) {
			$blogNotes[] = json_decode(file_get_contents($v));
		}
		return $blogNotes;
	}
}
?>