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

Route::get('test', function()
{
	$photo = new Photo;

	//return $photo->import_photos();

});


Route::get('splash', function()
{
	return View::make('splash');
});

Route::group(array('before' => 'ip-protection'), function()
{
	Route::get('news', 'NewsController@ShowNews');

	Route::get('photos/{year?}', function($year = 2013)
	{
		//if(View::exists($page)) return View::make($page);

		$photos = new Photo;
		$albums = $photos->import_photos();

		//return View::make('photos')->with('albums', $albums['data']);
	});

	Route::get('{category}/{page?}', function($page = null, $category = null)
	{
		if(View::exists($category)) return View::make($category);
		else if(View::exists($page)) return View::make($page);

		return App::abort(404);
	});
	
	

	Route::get('{page?}', function($page = 'home')
	{
		if(View::exists($page)) return View::make($page);

		return App::abort(404);
	});

	

	// Route::get('register', function()
	// {
	// 	return View::make('register');
	// });

	// Route::get('volunteers', function()
	// {
	// 	return View::make('volunteers');
	// });

	// Route::get('contact-us', function()
	// {
	// 	return View::make('contact');
	// });

	// Route::get('information', function()
	// {
	// 	return View::make('information');
	// });

	// Route::get('contact', function()
	// {
	// 	return View::make('contact');
	// });

	// Route::get('meow', function()
	// {
	// 	$facebook = new Facebook([
	// 		'appId'  => Config::get('keys.facebook.app_id'),
	// 		'secret' => Config::get('keys.facebook.secret_key'),
	// 	]);

	// 	dd($facebook->getUser());
	// });

	
});