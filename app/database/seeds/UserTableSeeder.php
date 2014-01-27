<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'username' 	=> 'admin',
			'role'		=> 1,
			'email' 	=> 'admin@eastercamp.dev',
			'password' 	=> Hash::make('password')
		]);

		// DB::table('users')->delete();

		// Sentry::getUserProvider()->create(array(
  //           'email'    => 'admin@ag-aus.org',
  //           'password' => 'password',
  //           'activated' => 1,
  //       ));

  //       Sentry::getUserProvider()->create(array(
  //           'email'    => 'mod@ag-aus.org',
  //           'password' => 'password',
  //           'activated' => 1,
  //       ));
	}
}