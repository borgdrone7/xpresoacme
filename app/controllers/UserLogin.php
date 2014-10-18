<?php

use Illuminate\Support\Facades\Redirect;

class UserLogin extends AcmeController implements iMenu {

    public function showMenu()
    {
        return View::make('common.sidebar')->with('menu', MenuBuilder::getUserMenu(USER_MENU::LOGIN));
    }
    public function show()
    {
        $u=new User();
        $u->name="Amir Cicak";
        $u->login="borg";
        $u->password=Hash::make('abc');
        //$u->save();

        return View::make('user_login')->with('d', $this);
    }
    public function attempt()
    {
        if (Auth::attempt(array('login' => Input::get("login"), 'password' => Input::get("password"))))
        {
            return Redirect::intended('user');
        } else {
            return View::make('user_login')->with('d', $this);
        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::route("user landing");
    }
    public function __construct() {
        AcmeController::__construct();
        $this->title="Login to user panel";
        $this->title_small="please login";
    }

}
