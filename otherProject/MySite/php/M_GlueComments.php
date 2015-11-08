<?php

//Представляет набор статей для комментирования
class M_GlueComments extends M_Glue
{
	public function IsM_Glue($wallpaper) 
	{
		$mas = $this->massive;
		$str = '';
		$wallpaper = file_get_contents($wallpaper);
		$comments = array('<!--comments', 'comments-->');
		for($i=0;$i<count($mas);$i++) 
		{
			$str .= self::ToM_Glue($mas,$i,$wallpaper);
		}
		$str = str_replace($comments, '', $str);
		return $str;
	}
}


?>