<?php
class Landing extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::LANDING));
    }
	public function show()
	{
		return View::make('landing')->with('d', $this);
	}
    public function __construct() {
        $this->title="Welcome to Xpreso ACME";
    }

}
