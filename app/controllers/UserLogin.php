<?php
class UserLogin extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::LOGIN));
    }
	public function show()
	{
		return View::make('user_login')->with('d', $this);
	}
    public function __construct() {
        AcmeController::__construct();
        $this->title="Login to user panel";
        $this->title_small="please login";
    }

}
