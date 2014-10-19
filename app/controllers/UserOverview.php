<?php

class UserOverview extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::OVERVIEW));
    }
    public function showOverview()
    {
        $this->u=Auth::user();
        return View::make('user_overview')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Overview - Xpreso ACME";
        $this->title_small="Overview of your questionnaire.";
    }

}
