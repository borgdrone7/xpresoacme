<?php
class StatsResults extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getAdminMenu(ADMIN_MENU::STATS_OVERVIEW));
    }
    public function show()
    {
        $this->u=Auth::user();
        return View::make('user_overview')->with('d', $this);
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Stats results - Xpreso ACME";
        $this->title_small="Results of the questionnaire.";
    }

}
