<?php
class StatsNationality extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::STATS_NATIONALITY));
    }
    public function show()
    {
        $this->stats1=DB::select("select sum(1) as num, value from useranswers,metas where useranswers.meta_id=metas.id and useranswers.question_id=6 and meta_id is not null and user_id in (select user_id from useranswers, metas where metas.question_id=1 and metas.value='Yes' and metas.id=useranswers.meta_id) group by meta_id");
        $this->stats2=DB::select("select sum(1) as num, value from useranswers,metas where useranswers.meta_id=metas.id and useranswers.question_id=6 and meta_id is not null and user_id in (select user_id from useranswers, metas where metas.question_id=1 and metas.value='No' and metas.id=useranswers.meta_id) group by meta_id");
        $this->nations=Meta::where("question_id", "=", 6)->get();
        return View::make('stats_nationality')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Stats Nationality - Xpreso ACME";
        $this->title_small="Results of the Nationality question.";
    }

}
