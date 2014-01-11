<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| 404 Page Trigger Response
|--------------------------------------------------------------------------
|
| When a view is not found the missing view page is presented.
|
*/

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});

/*
|--------------------------------------------------------------------------
| Caching Filter
|--------------------------------------------------------------------------
|
| The Caching filter keeps a cache of any page requested for up to 6 hours.
|
*/

Route::filter('cache', function($route, $request, $response = null)
{
    $page = ( Paginator::getCurrentPage() > 1 ? Paginator::getCurrentPage() : '' );

    $key = 'route-'.Str::slug( Request::url() ) . $page;

    if(is_null($response) && Cache::has($key) && App::environment() != 'local' && Config::get('app.debug') != 'true' && Config::get('app.cache') != 'true')
    {
        return Cache::get($key);
    }
    elseif(!is_null($response) && !Cache::has($key) && App::environment() != 'local' && Config::get('app.debug') != 'true' && Config::get('app.cache') != 'true')
    {
        Cache::put($key, $response->getContent(), 360);
    }
});

/*
|--------------------------------------------------------------------------
| IP and Date Protection
|--------------------------------------------------------------------------
|
| Filter visitors based on IP or date and reditect them if they do not meet
| the requirments.
|
*/

Route::filter('date-protection', function(){
	// If current date is not 2014 then goto facebook.
	return Redirect::to( 'https://www.facebook.com/southerneastercamp' );
});

Route::filter('ip-protection', function()
{
	// Do stuff before every request
	if (!in_array(Request::getClientIp(), Config::get('keys.custom.ip-protection.whitelist',[])) && Config::get('app.ip-protection.enabled') === true ) 
	{
		return Redirect::to( Config::get('app.ip-protection.redirect_url') );
	}
});