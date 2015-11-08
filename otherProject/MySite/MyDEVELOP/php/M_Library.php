<?php

//Отвечает за отображение контента на страницах
class M_Library extends C_Page
{
	public function __construct()
	{	
		$this->article = NULL;
		$this->aId = NULL;
		parent::__construct();
		$this->result_page = NULL;
		$this->main_title = 'Статьи';
		self::SwitchMove(self::$URI);
	}
	
	private function SwitchMove($catalog)
	{	
		
		extract(self::Clouser());
		if (is_string($catalog)) {
			$catalog = explode('_', $catalog);
			$code = array_pop($catalog);
			$articles = [$catalog[0]];
			if ($code == 'entity') {
				$any($catalog, ['*', 'articles', 'AI', 'AI']);
				$parsedown($this->result_page, $catalog);
				$crack = [$catalog[0]['PARENT'], $catalog[0]['PARENT']];
				$any($crack, ['*', 'directories', 'CHILD', 'PARENT']);
				$back($this->navPanel, $crack[0]);
				$nodes($crack, $this->navPanel);
				$pack = [$crack[0]['CHILD'], $crack[0]['CHILD']];
				$any($pack, ['*', 'articles', 'PARENT', 'PARENT']);
				$entities($pack, $this->navPanel);
			} elseif ($code == 'node') {
				$any($catalog, ['*', 'directories', 'CHILD', 'PARENT']);
				sort($catalog);
				$nodes($catalog, $this->result_page);
				$any($articles, ['TITLE, AI, PARENT', 'articles', 'PARENT', 'PARENT']);
				$entities($articles, $this->result_page);
				$linkz($this->result_page, $catalog);
				$crack = [$catalog[0]['PARENT'], $catalog[0]['PARENT']];
				$any($crack, ['*', 'directories', 'CHILD', 'PARENT']);
				sort($crack);
				$back($this->navPanel, $crack[0]);
				$nodes($crack, $this->navPanel);
				$pack = [$crack[0]['CHILD'], $crack[0]['CHILD']];
				$any($pack, ['*', 'articles', 'PARENT', 'PARENT']);
				$entities($pack, $this->navPanel);
			} elseif ($code === 'cEntity') {
				$this->menu_list = 'Редактор статей';
				$this->v_button = 'Создать';
				$this->ancestor = $catalog[0];
				ob_start();
				include '../MySITE/html/v_html_form.html';
				$this->result_page = ob_get_clean();
			} elseif ($code === 'cNode'){
				$this->ancestor = $catalog[0];
				ob_start();
				include '../MySITE/html/v_add_category.html';
				$this->result_page = ob_get_clean();
				$this->menu_list = 'Редактор каталогов';
			} elseif ($code === 'cList'){
				$C1(); $C2(); 
				
				
				$C3($catalog[0]);
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
			$a .= '<hr><ul class="LinkList Consruct">
			<li><a href="/?' . $c[0]['CHILD'] . '_cEntity" 
			class="LinkIs">Новая статья</a>
			<li><a href="/?' . $c[0]['CHILD'] . '_cNode" 
			class="LinkIs">Новая рубрика</a>
			<li><a href="/?' . $c[0]['CHILD'] . '_cList" 
			class="LinkIs">Новый список</a></ul>';
		};
		$entities = function($m, &$l) { 
			if (isset($m) && is_array($m) && !empty($m)) {
				$l .= '<ul class="LinkList Entity">'; 
				for($i = 0; $i < count($m); $i++) {
				$m[$i]['AI'] = $m[$i]['AI'] . '_entity';			
				$l .= '<li><a href="/?' . $m[$i]['AI'] . '"
				class="LinkIs">' . $m[$i]['TITLE'] . '</a>';
				}
				$l .= '</ul>'; 
			} else {
				$l .= '<ul class="LinkList"></ul>';
			}
		};
		$nodes = function($m, &$l) {
			if (isset($m) && is_array($m) && !empty($m)) {
				$l .= '<ul class="LinkList Node">'; 
				for($i = 1; $i < count($m); $i++) {
				$ref = $m[$i]['CHILD'] . '_node';			
				$l .= '<li><a href="/?' . $ref . '"
				class="LinkIs">' . $m[$i]['CATALOG'] . '</a>' . 
				'<br><form method="POST"><label class="DelCheck">
				Удалить<input type="checkbox" class="DelCheck" 
				name="check" value="' . $ref . '"></label>
				<input type="submit" name="ok" value="ok"></form>';
				}
				$l .= '</ul>'; 
				if (!isset($this->menu_list)) $this->menu_list = $m[0]['CATALOG'];
			} else {
				trigger_error('5.56');
			} 
		};
		$parsedown = function(&$l, $c) {
			if (isset($c) && is_array($c) && !empty($c)) {
				$this->menu_list = $c[0]['TITLE'];
				if (mb_strpos($c[0]['ARTICLE'], '~')) {
					self::AList($c[0]['ARTICLE']);
				} else {
					$needle = ["\r\n", "\n", "\r", '&para;'];
					$replace = ['<br>', '<br>', '<br>', ''];
					$l = str_replace($needle, $replace, $c[0]['ARTICLE']);
				}
			} else {
				trigger_error('5.56');
			}
		};
		$back = function(&$n, $m)
		{
			if (isset($m) && is_array($m) && !empty($m)) {
				$n = '<ul class="BackLink"><li><a
				href="/?' . $m['CHILD'] . '_node">' . $m['CATALOG'] . '</a></ul>';
			} else {
				trigger_error('5.56');
			}
		};
		$C1 = function() {
			if (isset($this->count, $this->add)) {
				(int)$this->count++;
			} elseif(isset($this->count, $this->revoke)) {
				(int)$this->count--;
			} else {
				$this->count = 1;
			}
		};
		$C2 = function() {
			for($i = 1, $this->lItem = NULL; $i <= $this->count; $i++) {
			$t = 't' . $i; if (empty($this->$t)) $this->$t = NULL;
			$line = str_pad($i, 2, '0', STR_PAD_LEFT);
			$this->lItem .= '<label class="InputList">' . $line . '. 
			<input type="text" class="InputL" name="t' . $i . '"
			value="' . $this->$t . '"></label>';
			}
		};
		$C3 = function($c) {
			if (!isset($this->theName)) $this->theName = NULL;
			$this->v_button = 'Сохранить';
			$this->ancestor = $c;
			ob_start();
			include '../MySITE/html/v_add_list.html';
			$this->result_page = ob_get_clean();
			$this->menu_list = 'Редактор списков';
		};
		
		$C4 = function() {
			
		};
		return compact('any', 'C4', 'back', 'parsedown', 'nodes', 'entities', 'linkz', 
			'C1', 'C2', 'C3');
	}
	
	private function AList($art) {
		$art = explode('~', $art);
		$art = array_filter($art);
		$this->result_page = '<ol class="AList">';
		for($i = 0; $i < count($art); $i++) {
			$this->result_page .= '<li><img src="item.png">' . $art[$i];
		}
		$this->result_page .= '</ol>';
		//print_r($art); exit;
	}
}
?>