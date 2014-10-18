<?php

use Illuminate\Support\Facades\Input;

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
        $q=new Question();
        if($id>0) { //it is edit not save new, 0 is save new
            $q=Question::find($id);
        }
        $q->question=Input::get("question");
        $q->questiontype_id=Input::get("questiontype");
        $q->required=(Input::get("required")=="required") ? 1:0;
        $q->save();

        //now do the meta data, note that I send closure to transaction because of $q
        DB::transaction(function () use($q)
        {
            $q->metas()->delete();
            $metavals = json_decode(Input::get("metavals"), true);
            $metas=[];
            foreach($metavals as $val) {
                $new=new Meta();
                $new->value=$val;
                $metas[]=$new;
            }
            $q->metas()->saveMany($metas);
        });

        var_dump(Input::all());
    }
    public function addQuestion()
    {
        $q=new Question();
        $this->q=$q;
        return View::make('questionedit')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Edit question - Xpreso ACME";
        $this->title_small="add/edit question";
    }

}
