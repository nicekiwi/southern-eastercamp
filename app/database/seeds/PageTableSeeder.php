<?php

class PageTableSeeder extends Seeder {

	public function run()
	{
		Page::create([
			'order'				=> 0,
			'meta_title'		=> 'Homepage',
			'slug'				=> 'home',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 10,
			'meta_title'		=> 'News',
			'slug'				=> 'news',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 20,
			'meta_title'		=> 'Register',
			'slug'				=> 'register',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 30,
			'meta_title'		=> 'Information',
			'slug'				=> 'information',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 40,
			'meta_title'		=> 'Parents &amp; Caregivers',
			'slug'				=> 'information/parents-caregivers',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 50,
			'meta_title'		=> 'Volunteer',
			'slug'				=> 'information/volunteer',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 60,
			'meta_title'		=> 'The Rules',
			'slug'				=> 'information/the-rules',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 70,
			'meta_title'		=> 'Gear List',
			'slug'				=> 'information/gear-list',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 80,
			'meta_title'		=> 'FAQ',
			'slug'				=> 'faq',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 90,
			'meta_title'		=> 'Downloads',
			'slug'				=> 'Downloads',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 100,
			'meta_title'		=> 'Wallpapers',
			'slug'				=> 'wallpapers',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 110,
			'meta_title'		=> 'Photos',
			'slug'				=> 'photos',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 120,
			'meta_title'		=> 'Videos',
			'slug'				=> 'videos',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);

		Page::create([
			'order'				=> 130,
			'meta_title'		=> 'Contact Us',
			'slug'				=> 'contact',
			'created_by'		=> 1,
			'updated_by'		=> 1,
		]);
	}
}