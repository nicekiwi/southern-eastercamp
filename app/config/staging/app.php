<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://staging.eastercamp.dev',

	/*
	|--------------------------------------------------------------------------
	| Enable caching
	|--------------------------------------------------------------------------
	|
	| Set to true to enable static page caching for the time set below.
	|
	| Default: 360 minutes (6 Hours).
	|
	*/

	'page-cache' => [

		'enabled' => false,
		'time' => 360,
	],

);
