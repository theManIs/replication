<?php
final class C_Controller
{
	public function __construct()
	{
		$base = new C_Base();
		$base->getVars();
		$base->huri();
		$base->auth();
		//C_Autorisation::Authorize();
		
		//C_Page::SwitchPage(self::$human);
	}
}

?>