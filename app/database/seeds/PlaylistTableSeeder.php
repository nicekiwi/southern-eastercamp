<?php

class PlaylistTableSeeder extends Seeder {

	public function run()
	{
		Playlist::create([
			'order'		=> 5,
			'title' 	=> 'Promos',
			'count'		=> 0
		]);

		Playlist::create([
			'order'		=> 10,
			'title' 	=> 'Highlights',
			'count'		=> 0
		]);

		Playlist::create([
			'order'		=> 15,
			'title' 	=> 'Segments',
			'count'		=> 0
		]);
	}
}