<?php
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 3:50 PM
 */
class ADMIN_MENU
{
    const LANDING = "Landing";
    const QUESTIONS = "Questions";
    const ADD_QUESTION = "Questions add";
    const LIST_QUESTION = "Questions list";
    const STATS = "Stats";
    const USERLANDING = "User Landing";
    const STATS_OVERVIEW = "Stats results";
    const STATS_COLORS = "Stats colors";
    const STATS_NATIONALITY = "Stats nationality";
}
class USER_MENU
{
    const LANDING = "Landing";
    const QUESTIONNAIRE = "Questionnaire";
    const OVERVIEW = "OVERVIEW";
    const RESET = "Reset questionnaire";
    const LOGIN = "Login";
    const LOGOUT = "Logout";
}

class MenuBuilder {

    public static function getAdminMenu($current) {

        $stats=new MenuItem(ADMIN_MENU::STATS, "Stats", "icon-bar-chart");
        $stats->addSubmenu(new MenuItem(ADMIN_MENU::STATS_OVERVIEW, "Questioonnaire results", "icon-star", URL::route('statsresults')));
        $stats->addSubmenu(new MenuItem(ADMIN_MENU::STATS_COLORS, "Colors", "icon-star", URL::route('statscolors')));
        $stats->addSubmenu(new MenuItem(ADMIN_MENU::STATS_NATIONALITY, "Nationality status", "icon-star", URL::route('statsnationality')));

        $questions=new MenuItem(ADMIN_MENU::QUESTIONS, "Questions", "icon-question");
        $questions->addSubmenu(new MenuItem(ADMIN_MENU::ADD_QUESTION, "Add question", "icon-star", URL::route('questionadd')));
        $questions->addSubmenu(new MenuItem(ADMIN_MENU::LIST_QUESTION, "List questions", "icon-star", URL::route('questions')));

        $menu=[];
        $menu[]=new MenuItem(ADMIN_MENU::LANDING, "Landing page", "icon-home", URL::route('landing'));
        $menu[]=$questions;
        $menu[]=$stats;
        $menu[]=new MenuItem(ADMIN_MENU::USERLANDING, "Users panel", "icon-user", URL::route('user landing')); //TODO: we can avoid last param by using USER_MENU::LANDING in routes to define name

        self::selectMenu($menu, $current);

        return $menu;
    }

    public static function getUserMenu($current) {

        $menu=[];
        $menu[]=new MenuItem(USER_MENU::LANDING, "Landing page", "icon-home", URL::route('user landing')); //TODO: we can avoid last param by using USER_MENU::LANDING in routes to define name
        $menu[]=new MenuItem(USER_MENU::QUESTIONNAIRE, "Questionnaire", "icon-docs", URL::route('user form'));
        $menu[]=new MenuItem(USER_MENU::OVERVIEW, "Overview", "icon-list", URL::route('user overview'));
        //$menu[]=new MenuItem(USER_MENU::RESET, "Reset questionnaire", "icon-trash", URL::route('user reset'));
        if(!Auth::check()) {
            $menu[]=new MenuItem(USER_MENU::LOGIN, "Login", "icon-login", URL::route('login'));
        } else {
            $menu[]=new MenuItem(USER_MENU::LOGOUT, "Logout", "icon-logout", URL::route('logout'));
        }

        self::selectMenu($menu, $current);

        return $menu;
    }

    private static function selectMenu(&$menu, $current) {
        foreach($menu as $m) {
            if($m->key==$current) $m->class="active";
            foreach($m->submenus as $sm) {
                if($sm->key==$current) {
                    $m->class="active open";
                    $sm->class="active";
                }
            }
        }
    }
} 