<?php
class UserLanding extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::LANDING));
    }
	public function show()
	{
		return View::make('user_landing')->with('d', $this);
	}
    public function __construct() {
        AcmeController::__construct();
        $this->title="Welcome to Xpreso ACME";
        $this->title_small="questionnaire app user panel";
    }

}
