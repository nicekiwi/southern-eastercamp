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
	Route::get('news', 'PostController@index_public');
	Route::get('downloads', 'DownloadController@index_public');

	Route::get('videos', 'PlaylistController@index_public');
	Route::get('photos/{slug?}', 'AlbumController@index_public');

	Route::get('faq/question/query/{string}', 'QuestionController@query_public');

	//Route::get('faq', 'QuestionCategoryController@index_public');
	Route::get('faq/{slug?}', 'QuestionCategoryController@index_public');
	Route::get('faq/question/{id}', 'QuestionController@index_public');

	Route::get('login', 'SessionsController@create');
	Route::get('logout', 'SessionsController@destroy');

	Route::resource('contact', 'ContactController');
	Route::resource('sessions', 'SessionsController');

	Route::group(['prefix' => 'admin', 'before' => 'auth'], function()
	{
		Route::get('/', function()
		{
			return View::make('admin.index');
		});

		Route::resource('posts', 'PostController');
		Route::resource('pages', 'PageController');
		Route::resource('albums', 'AlbumController');
		Route::resource('playlists', 'PlaylistController');
		Route::resource('videos', 'VideoController');

		Route::resource('questions', 'QuestionController');
		Route::resource('question-categories', 'QuestionCategoryController');
		Route::resource('downloads', 'DownloadController');
		Route::resource('wallpapers', 'WallpaperController');

		// Make sure only Admins can add or remove users and groups
		Route::group(['before' => 'auth.admin'], function()
		{
			Route::resource('users', 'UserController');
			Route::resource('groups', 'GroupController');
		});
	});

	Route::get('{slug?}/{slug2?}', 'PageController@index_public');
});

