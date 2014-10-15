<?php

use Symfony\Component\Console\Tests\Descriptor\ObjectsProvider;

class Questions extends BaseController implements iMenu {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function showMenu()
    {
        $menu=array();
        return View::make('common.sidebar')->with('menu', $menu);
    }
    public function listQuestions()
    {
        return View::make('landing')->with('d', $this);
    }

}
