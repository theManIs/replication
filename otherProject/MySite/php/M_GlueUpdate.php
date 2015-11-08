<?php
//Представляет статьи для редактирования
class M_GlueUpdate extends M_Glue
{
	public function IsM_Glue($wallpaper) 
	{
		$mas = $this->massive;
		$str = '';
		$wallpaper = file_get_contents($wallpaper);
		$update = array('<!--update', 'update-->');
		for($i=0;$i<count($mas);$i++) 
		{
			$str .= self::ToM_Glue($mas,$i,$wallpaper);
		}
		$str = str_replace($update, '', $str);
		return $str;
	}
}
?>