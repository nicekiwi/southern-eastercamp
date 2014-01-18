<?php

class Photo extends Eloquent {

	private $facebook;

	function __construct() {
		$this->facebook = new Facebook([
			'appId'  => Config::get('keys.facebook.app_id'),
			'secret' => Config::get('keys.facebook.secret_key'),
		]);
	}

	public function import_photos() {

		// $facebook = new Facebook([
		// 	'appId'  => Config::get('keys.facebook.app_id'),
		// 	'secret' => Config::get('keys.facebook.secret_key'),
		// ]);

		//dd($this->facebook);

		// $albums = null;

		// $key = 'fb-albums';

	 //    if(Cache::has($key))
	 //    {
	 //        $albums = Cache::get($key);
	 //    }
	 //    elseif(!Cache::has($key))
	 //    {
	 //        $albums = Cache::forever($key, $facebook->api('/southerneastercamp/albums?fields=id,name,count&limit=100'));
	 //    }

		//$albums = $facebook->api('/10151439168936716/photos');


		//return $albums;

		$albums = Cache::rememberForever('fb-albums', function()
		{
		    return $this->facebook->api('/southerneastercamp/albums?fields=id,name,count&limit=100');
		});

		foreach ($albums['data'] as $album) 
		{
			//echo $album['id'];
			if(strpos($album['name'], ': Album') !== false) 
			{
				$photos = Cache::rememberForever('fb-album-photos-' . $album['id'], function() use ($album)
				{
				    return $this->facebook->api('/' . $album['id'] . '/photos?fields=id,picture,width,height,source&limit=' . $album['count']);
				});

				foreach ($photos['data'] as $photo) 
				{
					echo '<img src="' . $photo['picture'] . '" />';
				}
			}

			


		}

	}

}