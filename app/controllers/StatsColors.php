<?php
class StatsColors extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::STATS_COLORS));
    }
    public function show()
    {
        $stats = DB::select('select sum(1) as num, value from useranswers,metas where useranswers.meta_id=metas.id and useranswers.question_id=? and meta_id is not null group by meta_id', array(8));
        $this->stats=$stats;
        return View::make('stats_colors')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Stats colors - Xpreso ACME";
        $this->title_small="Results of the colors question.";
    }

}
