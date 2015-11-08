 <?php
 
 class M_Users extends C_Page
{
	public function __construct()
	{
		parent::__construct();
		$users = new M_Query(array('someValue'));
		$users = new M_Glue($users->GetAllUsers());
		$this->result_page = $users->IsM_Glue('../mysite/html/v_card.html');
		ob_start();
		include('html/v_nav_panel.html');
		$this->navPanel = ob_get_clean();
		$this->main_title = 'Пользователи';
		$this->menu_list = 'Все пользователи';
	}
}