<?php

class QuestionCategoryTableSeeder extends Seeder {

	public function run()
	{
		QuestionCategory::create([
			'order'		=> 5,
			'title' 	=> 'General',
			'slug' 		=> 'general'
		]);

		QuestionCategory::create([
			'order'		=> 10,
			'title' 	=> 'Registration',
			'slug' 		=> 'registration'
		]);

		QuestionCategory::create([
			'order'		=> 15,
			'title' 	=> 'Parents & Caregivers',
			'slug' 		=> 'parents-caregivers'
		]);

		QuestionCategory::create([
			'order'		=> 20,
			'title' 	=> 'Transport',
			'slug' 		=> 'transport'
		]);
	}
}