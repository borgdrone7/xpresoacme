<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//admin routes
Route::get('/', array('as' => 'landing', 'uses' => 'Landing@show'));
Route::get('/questions', array('as' => 'questions', 'uses' => 'Questions@listQuestions'));
Route::get('/questionadd', array('as' => 'questionadd', 'uses' => 'QuestionEdit@addQuestion'));
Route::get('/questionedit/{id}', array('as' => 'questionedit', 'uses' => 'QuestionEdit@editQuestion'));
Route::get('/questiondelete/{id}', array('as' => 'questiondelete', 'uses' => 'QuestionEdit@deleteQuestion'));
Route::post('/questionsave/{id}', array('as' => 'questionsave', 'uses' => 'QuestionEdit@saveQuestion'));
Route::get('/stats/results', array('as' => 'statsresults', 'uses' => 'StatsResults@show'));
Route::get('/stats/colors', array('as' => 'statscolors', 'uses' => 'StatsColors@show'));
Route::get('/stats/nationality', array('as' => 'statsnationality', 'uses' => 'StatsNationality@show'));

//user routes
Route::get('/user', array('as' => 'user landing', 'uses' => 'UserLanding@show'));
Route::get('/user/form', array('as' => 'user form', 'uses' => 'UserForm@showForm'));
Route::post('/user/formsave', array('as' => 'user form save', 'uses' => 'UserForm@saveForm'));
Route::get('/user/overview', array('as' => 'user overview', 'uses' => 'UserOverview@showOverview'));
//Route::get('/user/reset', array('as' => 'user reset', 'uses' => 'QuestionEdit@editQuestion'));
Route::get('/user/login', array('as' => 'login', 'uses' => 'UserLogin@show'));
Route::post('/user/login', array('as' => 'login attempt', 'uses' => 'UserLogin@attempt'));
Route::get('/user/logout', array('as' => 'logout', 'uses' => 'UserLogin@logout'));
