<?php

return array(

	'connections' => array(

		'mysql' => array(
			'host'      => 'localhost',
			'database'  => 'eastercamp-test',
			'username'  => 'root',
			'password'  => 'password',
		),

		'sqlite' => array(
			'database' => __DIR__.'/../../database/local.sqlite',
		),
	),

);
