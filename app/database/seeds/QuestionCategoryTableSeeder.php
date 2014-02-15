<?php

class QuestionCategoryTableSeeder extends Seeder {

	public function run()
	{
		QuestionCategory::create([
			'order'		=> 5,
			'title' 	=> 'General',
			'slug' 		=> 'general',
			'count'		=> 0
		]);

		QuestionCategory::create([
			'order'		=> 10,
			'title' 	=> 'Registration',
			'slug' 		=> 'registration',
			'count'		=> 0
		]);

		QuestionCategory::create([
			'order'		=> 15,
			'title' 	=> 'Parents & Caregivers',
			'slug' 		=> 'parents-caregivers',
			'count'		=> 0
		]);

		QuestionCategory::create([
			'order'		=> 20,
			'title' 	=> 'Transport',
			'slug' 		=> 'transport',
			'count'		=> 0
		]);
	}
}