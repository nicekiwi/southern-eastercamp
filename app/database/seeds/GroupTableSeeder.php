<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		Group::create([
			'id'				=> 5,
			'title'				=> 'Administrators',
			'permissions'		=> 'All access to everything.',
		]);

		Group::create([
			'id'				=> 10,
			'title'				=> 'Power Users',
			'permissions'		=> 'Access to everything except Users.',
		]);
	}
}