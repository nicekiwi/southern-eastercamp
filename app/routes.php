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
	$post = new Post;
	return $post->download_posts();
});

Route::get('news', 'PostController@index_public');

Route::get('videos', 'PlaylistController@index_public');
Route::get('photos/{slug?}', 'AlbumController@index_public');

Route::get('faq', 'QuestionCategoryController@index_public');
Route::get('faq/question/{id}', 'QuestionController@index_public');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	Route::get('/', function()
	{
		return View::make('admin.index');
	});

	Route::resource('posts', 'PostController');
	Route::resource('albums', 'AlbumController');
	Route::resource('playlists', 'PlaylistController');
	Route::resource('videos', 'VideoController');

	Route::resource('questions', 'QuestionController');
	Route::resource('question-categories', 'QuestionCategoryController');
	Route::resource('downloads', 'DownloadController');

	//Route::resource('wallpapers', 'WallpaperController');
});

Route::get('splash', function()
{
	return View::make('splash');
});

Route::group(array('before' => 'ip-protection'), function()
{
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
});

