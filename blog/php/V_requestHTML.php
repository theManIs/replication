<?php
class V_requestHTML
{
	public static function blockDoc()
	{
		$data = (new M_dataBase())->getData('notes/*');
		$html = '';
		//print_r($data);
		for($c = (count($data) - 2), $i = (count($data) - 1); $i > $c; $i--) {
			$html .= '<div class="lastWrite"><h2>' . $data[$i][1] . '</h2>';
			$html .= '<p>' . $data[$i][2] . '</p><em>' . $data[$i][3] . '</em><hr></div>';
		}
		$html .= '<div class="boxY"><p class="yeasturday">Что было недавно:</p>';
		$html .= '<ul class="thumbnails">';
		for($c = (count($data) - 6), $i = (count($data) - 2); $i > $c; $i--) {
			$html .= '<li class="span5 miniWrite"><div class="thumbnail"> <h3>' . $data[$i][1];
			$html .= '</h3><em>' . $data[$i][3] . '</em><input type="hidden" ';
			$html .= 'class="imp" value="' . $data[$i][4] . '"></div></li>';
		}
		$html .= '</ul></div><hr>';
		return $html;
	}
}
?>