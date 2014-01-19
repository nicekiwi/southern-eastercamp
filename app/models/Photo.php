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

		echo '<link href="/css/app.css" media="screen, projection" rel="stylesheet" type="text/css" />';
		//return $albums;

		$albums = Cache::rememberForever('fb-albums', function()
		{
		    return $this->facebook->api('/southerneastercamp/albums?fields=id,name,count&limit=100');
		});

		echo '<div class="row"><div class="small-12 columns">';
		echo '<ul class="clearing-thumbs" data-clearing>';

		foreach ($albums['data'] as $album) 
		{
			//echo $album['id'];
			if(strpos($album['name'], 'EC13: Album 1') !== false) 
			{
				$photos = Cache::rememberForever('fb-album-photos-' . $album['id'], function() use ($album)
				{
				    return $this->facebook->api('/' . $album['id'] . '/photos?fields=id,picture,width,height,source&limit=' . $album['count']);
				});

				foreach ($photos['data'] as $photo) 
				{
					echo '<li><a class="th" href="' . $photo['source'] . '"><img src="' . $photo['picture'] . '" /></a></li>';
				}
			}

		


		}
		echo '</ul>';
		echo "</div></div>";

		echo '<script src="/bower_components/jquery/jquery.js"></script>';
	    echo '<script src="/bower_components/foundation/js/foundation.min.js"></script>';
	    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>';
	    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax-min.js"></script>';
	    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>';
	    echo '<script src="/js/jquery.appear.js"></script>';

	    echo '<script src="/js/masonry.pkgd.min.js"></script>';
	    echo '<script src="/js/nivo-lightbox.js"></script>';

	    echo '<script src="/js/app.js"></script>';

	}

}