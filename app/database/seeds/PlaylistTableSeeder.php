Í<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		Playlist::create([
			'id'		=> -1,
			'title' 	=> 'None',
		]);
	}
}