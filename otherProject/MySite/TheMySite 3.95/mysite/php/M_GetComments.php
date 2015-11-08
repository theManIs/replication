<?php

//Получает комментарии к статье
class M_GetComments extends M_Glue
{
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