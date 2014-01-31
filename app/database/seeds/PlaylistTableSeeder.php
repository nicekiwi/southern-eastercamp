<?php

class PlaylistTableSeeder extends Seeder {

	public function run()
	{
		Playlist::create([
			'order'		=> 5,
			'title' 	=> 'Promos'
		]);

		Playlist::create([
			'order'		=> 10,
			'title' 	=> 'Highlights'
		]);

		Playlist::create([
			'order'		=> 15,
			'title' 	=> 'Segments'
		]);
	}
}