<?php
/**
 * Created by PhpStorm.
 * User: borgdrone7
 * Date: 10/15/14
 * Time: 8:26 PM
 */

class MenuItem {
    public $key;
    public $class;
    public $title;
    public $url;
    public $icon;
    public $submenus=array();

    public function isSub() {
        return count($this->submenus);
    }
    public function addSubmenu($menuitem) {
        $this->submenus[$menuitem->key]=$menuitem;
    }
    public function __construct($key, $title, $icon="", $url="javascript:;") {
        $this->url=$url;
        $this->title=$title;
        $this->icon=$icon;
        $this->key=$key;
    }
} 