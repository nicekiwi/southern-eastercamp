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

Route::group(array('before' => 'ip-protection'), function()
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

	Route::get('contact', function()
	{
		return View::make('contact');
	});

	Route::get('meow', function()
	{
		$facebook = new Facebook([
			'appId'  => Config::get('facebook.app_id'),
			'secret' => Config::get('facebook.secret_key'),
		]);

		dd($facebook->getUser());
	});

	Route::get('news', 'NewsController@ShowNews');
});