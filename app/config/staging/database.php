<?php

return array(

	'connections' => array(

		'mysql' => array(
			'host'      => 'localhost',
			'database'  => Config::get('keys.laravel.database.db_name'),
			'username'  => Config::get('keys.laravel.database.username'),
			'password'  => Config::get('keys.laravel.database.password'),
		),

		'sqlite' => array(
			'database' => __DIR__.'/../../database/staging.sqlite',
		),
	),

);
