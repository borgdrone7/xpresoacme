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
Route::post('/questionsave/{id}', array('as' => 'questionsave', 'uses' => 'QuestionEdit@saveQuestion'));

//user routes
Route::get('/user', array('as' => 'user landing', 'uses' => 'UserLanding@show'));
Route::get('/user/form', array('as' => 'user form', 'uses' => 'Questions@listQuestions'));
Route::get('/user/view', array('as' => 'user view', 'uses' => 'QuestionEdit@addQuestion'));
Route::get('/user/reset', array('as' => 'user reset', 'uses' => 'QuestionEdit@editQuestion'));
Route::get('/user/login', array('as' => 'login', 'uses' => 'QuestionEdit@editQuestion'));
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'QuestionEdit@saveQuestion'));
