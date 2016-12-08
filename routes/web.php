<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', array('as' => 'journal.home.index', 'uses' => 'HomeController@index'));
 Route::get('/about', array('as' => 'journal.home.about', 'uses' => 'HomeController@about_us'));

 Route::get('/projects', array('as' => 'journal.home.projects', 'uses' => 'HomeController@projects'));
 Route::get('/contact', array('as' => 'journal.home.contact', 'uses' => 'HomeController@contact'));

  Route::get('/register', array('as' => 'journal.home.register', 'uses' => 'HomeController@register'));

  Route::post('register', 'Auth\RegisterController@register');

  // Login Routes...
    Route::get('login', ['as' => 'journal.login', 'uses' => 'Auth\LoginController@showLoginForm']);
    // Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

  Route::post('login', ['as' => 'journal.login', 'uses' => 'UsersController@login']);



    // Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
  // Route::post('login', 'Auth\RegisterController@register');
  // Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
//Auth::routes();

//Route::get('/home', 'HomeController@index');

  Route::get('logout', function (){
		Auth::logout();
		return redirect('/');
	});

// Version Management
 // Route::get('/', array('as' => 'journal.home.index', 'uses' => 'HomeController@index'));
Route::resource('versions', 'VersionsController');
Route::resource('years', 'YearsController');
Route::resource('issues', 'IssuesController');

Route::get('versions/year/{yearId}/issues', ['as' => 'issues.ajax', 'uses' => 'IssuesController@getIssuesList']);

Route::resource('users', 'UsersController');