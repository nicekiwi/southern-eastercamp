<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PlaylistTableSeeder');
		$this->call('QuestionCategoryTableSeeder');
		$this->call('GroupTableSeeder');

		if (App::environment('local')) $this->call('UserTableSeeder');
	}

}