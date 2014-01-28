Í<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		QuestionCategory::create([
			'id'		=> -1,
			'title' 	=> 'None',
		]);
	}
}