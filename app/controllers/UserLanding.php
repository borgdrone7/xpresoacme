<?php

class UserLanding extends AcmeController implements iMenu
{

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::LANDING));
    }

    public function show()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $name = Auth::user()->name;
            $this->welcome = "$name ($id), welcome to Xpreso Acme user panel, use left menu to start.";
        } else {
            $this->welcome = "Welcome to Xpreso Acme user panel, please login to start.";
        }

        return View::make('user_landing')->with('d', $this);
    }

    public function __construct()
    {
        AcmeController::__construct();
        $this->title = "Welcome to Xpreso ACME";
        $this->title_small = "questionnaire app user panel";
    }

}
