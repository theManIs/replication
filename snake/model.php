<?php

function addRow($s, $rec, &$record = '') {
	if (!empty($rec[0])) {
		$m = array();
		list($m[0], $m[1], $m[2]) = $rec;
		ksort($m);
		$m[2] .= "\r\n";
		switch($s) {
			case 1;
				return implode(' ', $m);
				break;
			case 2;
				$k = implode(' ', $m);
				array_push($record, $k);
				break;
		}
	}
}

function matchRow($rec, &$record) {
	$match = false;
	foreach($record as &$v) {
		$m = explode(' ', $v);
		if ($rec[0] === $m[0]) {
			if ((int)$m[1] < (int)$rec[1]) $m[1] = $rec[1];
			$m[2] = ((int)$m[2] + (int)$rec[1]) . "\r\n";
			$v = implode(' ', $m);
			$match =  true;
		}
	}
	return $match;
}

function makeRow($myFile, $recieve) {
	$record = file($myFile);
	$writeString = '';
	$rec = explode(' ', $recieve);
	if (empty($record)) {
		return addRow(1, $rec);
	} else {
		if (!matchRow($rec, $record)) addRow(2, $rec, $record);
		return implode('', $record);
	}
}

function createFile($fileName, $dir = __DIR__, $reWrite = false) 	{
	$newName = $dir . '/' . $fileName;
	if (file_exists($newName)) {
		if (true === $reWrite) {
			unlink($fileName);
			self::createFile($fileName, $dir, $reWrite);
		}
	} else {
		$oldName = tempnam($dir, '');
		rename($oldName, $newName);
	}
	return $newName;
}
?>