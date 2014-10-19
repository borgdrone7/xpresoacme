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
    public function saveForm()
    {
        $this->u=Auth::user();
        foreach($this->u->useranswers as $a) {
            $input=Input::get($a->cn());
            $a->set_new_value($input);
            $a->save();
        }
        var_dump(Input::all());
        return Redirect::route('user overview');
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Questionnaire - Xpreso ACME";
        $this->title_small="After you answer all questions click \"Save\" at the bottom of this page to save.";
    }

}
