<?php

class Questions extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::LIST_QUESTION));
    }
    public function listQuestions()
    {
        $this->questions = Question::all();
        return View::make('questions')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Questions list -Xpreso ACME";
        $this->title_small="list questions";
    }

}
