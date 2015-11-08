<?php

//Отвечает за отображение контента на страницах
class M_Search extends M_Article
{
	public function __construct()
	{	
		parent::__construct();
		$this->result_page = NULL;
		$this->main_title = 'Статьи';
		self::SwitchMove(self::$URI);
		if(self::$URI == '1.node' || self::$URI == '0.node')
			$this->navPanel = file_get_contents('html/v_nav_panel.html');
	}
	
	private function SwitchMove($catalog)
	{	
		extract(self::Clouser());
		if (is_string($catalog)) {
			$catalog = explode('.', $catalog);
			$code = array_pop($catalog);
			$articles = [$catalog[0]];
			if ($code == 'entity') {
				$any($catalog, ['*', 'articles', 'aId', 'aId']);
				$parsedown($this->result_page, $catalog);
				$crack = [$catalog[0]['parent'], $catalog[0]['parent']];
				$any($crack, ['*', 'directories', 'iDir', 'parent']);
				$back($this->navPanel, $crack[0]);
				$nodes($crack, $this->navPanel);
				$pack = [$crack[0]['iDir'], $crack[0]['iDir']];
				$any($pack, ['*', 'articles', 'parent', 'parent']);
				$entities($pack, $this->navPanel);
			} elseif ($code == 'node') {
				$any($catalog, ['*', 'directories', 'iDir', 'parent']);
				$nodes($catalog, $this->result_page);
				$any($articles, ['title, aId, parent', 'articles', 'parent', 'parent']);
				$entities($articles, $this->result_page);
				$linkz($this->result_page, $catalog);
				$crack = [$catalog[0]['parent'], $catalog[0]['parent']];
				$any($crack, ['*', 'directories', 'iDir', 'parent']);
				$back($this->navPanel, $crack[0]);
				$nodes($crack, $this->navPanel);
				$pack = [$crack[0]['iDir'], $crack[0]['iDir']];
				$any($pack, ['*', 'articles', 'parent', 'parent']);
				$entities($pack, $this->navPanel);
			} elseif ($code == 'cEntity') {
				ob_start();
				include 'html/v_html_form.html';
				$this->result_page = ob_get_clean();
			} elseif ($code == 'cNode'){
				ob_start();
				include 'html/v_add_category.html';
				$this->result_page = ob_get_clean();
			} else {
				trigger_error('5.56');	
			}
		} else {
			trigger_error('5.56');
		}
	}
	
	private function Clouser()
	{
		$any = function(&$w, $t) {
			$w = array_pop($w);	$w = intval($w); $w = [$w , $w];
			$w = new M_Query($w); $w = $w->Select($t);
		};			
		$linkz = function(&$a, $c) {
			$a .= '<ul class="LinkList"><li>Расширение
			<li><a href="' . $c[0]['iDir'] . '.cEntity" 
			class="LinkIs">Новая статья</a>
			<li><a href="' . $c[0]['iDir'] . '.cNode" 
			class="LinkIs">Новая рубрика</a></ul>';
		};
		$entities = function($m, &$l) { 
			if (isset($m) && is_array($m) && !empty($m)) {
				$l .= '<ul class="LinkList"><li>Сущности'; 
				for($i = 0; $i < count($m); $i++) {
				$m[$i]['aId'] = $m[$i]['aId'] . '.entity';			
				$l .= '<li><a href="' . $m[$i]['aId'] . '"
				class="LinkIs">' . $m[$i]['title'] . '</a>';
				}
				$l .= '</ul>'; 
			} else {
				$l .= '<ul class="LinkList"><li>Сущности</ul>';
			}
		};
		$nodes = function($m, &$l) { 
			if (isset($m) && is_array($m) && !empty($m)) {
				$l .= '<ul class="LinkList"><li>Узлы'; 
				for($i = 1; $i < count($m); $i++) {
				$m[$i]['iDir'] = $m[$i]['iDir'] . '.node';			
				$l .= '<li><a href="' . $m[$i]['iDir'] . '"
				class="LinkIs">' . $m[$i]['catalog'] . '</a>';
				}
				$l .= '</ul>'; 
				$this->menu_list = $m[0]['catalog'];
			} else {
				trigger_error('5.56');
			} 
		};
		$parsedown = function(&$l, $c) {
			if (isset($c) && is_array($c) && !empty($c)) {
				$this->menu_list = $c[0]['title'];
				$needle = ["\r\n", "\n", "\r", '&para;', '<br><br>'];
				$replace = ['<br>', '<br>', '<br>', '', '<br>'];
				$l = str_replace($needle, $replace, $c[0]['article']);
				
				$array = [
					'/Список параметров/', '/Возвращаемые значения/',
					'/Описание/', '/Примечания/', '/Список изменений/',
					'/Ошибки/',	'/Примеры/', '/Смотрите также/'
				];
				$l = preg_replace($array, '<b>$0</b>', $l);
				$l = preg_replace('/&lt;(.*)?&gt;/', '<code class="Script">$0</code>', $l);
				$l = preg_replace("/(<\/b>)(.*?)(<b>)/", '$1<p class="Parag">$2</p>$3', $l);
			} else {
				trigger_error('5.56');
			}
		};
		$back = function(&$n, $m)
		{
			if (isset($m) && is_array($m) && !empty($m)) {
				$n = '<ul class="BackLink"><li><a
				href="' . $m['parent'] . '.node">' . $m['catalog'] . '</a></ul>';
			} else {
				trigger_error('5.56');
			}
		};
		return compact('any', 'back', 'parsedown', 'nodes', 'entities', 'linkz');
	}
}
?>