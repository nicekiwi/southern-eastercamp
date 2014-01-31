<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'first_name'	=> 'George',
			'last_name'		=> 'Weesley',
			'group_id'		=> 5,
			'email' 		=> 'admin@eastercamp.dev',
			'password' 		=> Hash::make('password')
		]);
	}
}