<?php

class QuestionEdit extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::ADD_QUESTION));
    }
    public function editQuestion($id)
    {
        $q=Question::find($id);
        $this->q=$q;
        return View::make('questionedit')->with('d', $this);
    }
    public function saveQuestion($id)
    {
        $q=Question::find($id);
        $q->question=Input::get("question");
        $this->q=$q;
        return View::make('questionedit')->with('d', $this);
    }
    public function addQuestion()
    {
        $q=new Question();
        $this->q=$q;
        return View::make('questionedit')->with('d', $this);
    }
    public function __construct() {
        $this->title="Edit question - Xpreso ACME";
    }

}
