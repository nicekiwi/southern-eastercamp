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

Route::get('splash', function()
{
	return View::make('splash');
});

Route::group(array('before' => 'ip-protect'), function()
{
	Route::get('/', function()
	{
		return View::make('home');
	});

	Route::get('registration', function()
	{
		return View::make('registration');
	});

	Route::get('contact-us', function()
	{
		return View::make('contact');
	});

	Route::get('information', function()
	{
		return View::make('information');
	});

	Route::get('meow', function()
	{
		$facebook = new Facebook(array('appId'  => '221201634590438','secret' => 'e52043468bf51ec60d834b0710bc0547',));
		dd($facebook);
	});

	Route::get('news', 'NewsController@ShowNews');
});