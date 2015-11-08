<?php
//Вывод статей на экран
class M_Glue extends C_Base
{
	public $massive;
	
	public function __construct($param)
	{
		$this->massive = $param;
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
		$mas = $this->massive;
		$str = '';
		$wallpaper = file_get_contents($wallpaper);
		for($i=0;$i<count($mas);$i++) 
		{
			$str .= self::ToM_Glue($mas,$i,$wallpaper);
		}
		return $str;
	}
}

?>