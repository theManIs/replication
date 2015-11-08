<?php
//Пердсавляет статьи для удаления
class M_GlueDelete extends M_Glue
{
	public function IsM_Glue($wallpaper) 
	{
		if(!is_array($this->massive))  return $this->massive;
		$mas = $this->massive;
		$str = '';
		$wallpaper = file_get_contents($wallpaper);
		$delete = array('<!--delete', 'delete-->');
		for($i=0;$i<count($mas);$i++) 
		{
			$str .= self::ToM_Glue($mas,$i,$wallpaper);
		}
		$str = str_replace($delete, '', $str);
		return $str;
	}
}
?>