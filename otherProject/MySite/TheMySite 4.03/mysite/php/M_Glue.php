<?php
//Вывод статей на экран
class M_Glue
{
	public $massive;
	
	public function __construct($param)
	{
		$this->massive = $param;
		if(empty($this->massive) || $this->massive == '')  $this->massive = '<h2 class="enter">Ничего не нашлось</h2>';
	}
	
	public function ToM_Glue($mas,$i,$wallpaper)
	{
		foreach($mas[$i] as $key => $value) 
		{
			$key = '<?=$'.$key.'?>';
			$wallpaper = str_replace($key, $value, $wallpaper);
		}
		ob_start();
		echo $wallpaper;
		$str = ob_get_clean();
		return $str;
	}
	
	public function IsM_Glue($wallpaper) 
	{
		if(!is_array($this->massive))  return $this->massive;
		$str = '';
		$wallpaper = file_get_contents($wallpaper);
		for($i=0;$i<count($this->massive);$i++) 
		{
			$str .= self::ToM_Glue($this->massive,$i,$wallpaper);
		}
		return $str;
	}
}

?>