<?php 
//Представление статей на странице поиска
class M_GlueSearch extends M_Glue
{

	public function IsM_Glue($wallpaper)
	{
		$mas = $this->massive;
		if(!is_array($mas)) 
		{
			$r = '<h1 class="enter">Начните поиск!</h1>';
			return $r;
		} 
		elseif(empty($mas)) 
		{
			$r = '<h2 class="enter">Ничего не нашлось</h2>';
			return $r;
		} else {
			$r = parent::IsM_Glue($wallpaper);
		}
		return $r;
	}
}

?>