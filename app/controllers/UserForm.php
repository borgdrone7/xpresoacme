<?php

class UserForm extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::QUESTIONNAIRE));
    }
    public function showForm()
    {
        $this->u=Auth::user();
        return View::make('user_form')->with('d', $this);
    }
    public function showView()
    {
        $this->u=Auth::user();
        return View::make('user_view')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Questionnaire - Xpreso ACME";
        $this->title_small="After you answer all questions click \"Save\" at the bottom of this page to save.";
    }

}
