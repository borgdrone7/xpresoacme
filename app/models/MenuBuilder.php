<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/16/14
 * Time: 3:50 PM
 */

class MenuBuilder {

    public static function getAdminMenu($current) {

        $questions=new MenuItem(ADMIN_MENU::QUESTIONS, "Questions", "icon-question");
        $questions->addSubmenu(new MenuItem(ADMIN_MENU::ADD_QUESTION, "Add question", "icon-star", URL::route('questionedit')));
        $questions->addSubmenu(new MenuItem(ADMIN_MENU::LIST_QUESTION, "List questions", "icon-star", URL::route('questions')));

        $menu=[];
        $menu[]=new MenuItem(ADMIN_MENU::LANDING, "Landing page", "icon-home", URL::route('landing'));
        $menu[]=$questions;
        $menu[]=new MenuItem(ADMIN_MENU::STATS, "Stats", "icon-bar-chart");

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