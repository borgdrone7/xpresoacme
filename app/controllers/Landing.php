<?php
use Symfony\Component\Console\Tests\Descriptor\ObjectsProvider;

class Landing extends BaseController implements iMenu {

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

        $questions=new MenuItem("Questions", "icon-question");
        $questions->addSubmenu(new MenuItem("Add question"));
        $questions->addSubmenu(new MenuItem("List questions", "icon-star", URL::route('questions')));

        $menu[]=new MenuItem("Landing page", "icon-home", URL::route('landing'));
        $menu[]=$questions;
        $menu[]=new MenuItem("Stats", "icon-bar-chart");

        return View::make('common.sidebar')->with('menu', $menu);
    }
	public function show()
	{
        $this->title="Xpreso ACME landing page";
		return View::make('landing')->with('d', $this);
	}

}
