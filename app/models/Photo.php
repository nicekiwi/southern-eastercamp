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

		$albumID = Input::get('album_fb_id');
		$albumYear = Input::get('album_year');
		$albumOrder = Input::get('album_order');

		if($albumID == '' || $albumYear == '' || $albumOrder == '') return Redirect::to('admin/dashboard')->with('missing_stuff', true);
		
		// Test and see if album already exists in database.
		if(DB::table('albums')->where('fb_id', '=', $albumID)->count() > 0)
		{
			return Redirect::to('admin/dashboard')->with('dup_album', true);
		}
		else
		{
			// Call in the Facebook-SDK
			$facebook = IoC::resolve('facebook-sdk');

			// Get the JSON album info
			$album_json_data = $facebook->api('/'.$albumID);

			// Get the JSON photo info
			$photo_json_data = $facebook->api('/'.$albumID.'/photos?limit=220');

			// Loop through all photos in JSON feed
			foreach($photo_json_data['data'] as $data)
			{
				// Create link_large
				$link_large = substr($data['picture'], 0, -5). 'n.jpg';

				// Create link_thumb
				$link_thumb = explode('/', $data['picture']);
				$link_thumb = $link_thumb[count($link_thumb)-1];
				$link_thumb = substr($link_thumb, 0, -6);

				// Calculate Width and Height
				$photo_width = 180;
				$photo_height = ($data['height'] * $photo_width) / $data['width'];

				// Calculate thumb class
				$class = '';
				if($photo_height > 180) 		$class = 'vertical';
				else if($photo_height < 120) 	$class = 'smaller';					
				if($photo_width < 180) 			$class .= ' thin';

				// Insert each photo into photos table
				// linked to the album by albumID.
				DB::table('photos')->insert(array(
					'album_id' 	=> $albumID, 
					'link' 		=> $data['picture'],
					'link_large'=> $link_large,
					'link_thumb'=> $link_thumb,
					'width' 	=> $photo_width,
					'height' 	=> $photo_height,
					'class'		=> $class
				));
			}

			// Insert the album into ablbums table
			$insert_album = DB::table('albums')->insert(array(
				'fb_id' 	=> $albumID, 
				'year' 		=> $albumYear,
				'name' 		=> $album_json_data['name'],
				'count' 	=> $album_json_data['count'],
				'auth'		=> 1,
				'order'		=> $albumOrder,
			));

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

		// echo '<link href="/css/app.css" media="screen, projection" rel="stylesheet" type="text/css" />';
		// //return $albums;

		// $albums = Cache::rememberForever('fb-albums', function()
		// {
		//     return $this->facebook->api('/southerneastercamp/albums?fields=id,name,count&limit=100');
		// });

		// echo '<style>.vertical{ margin-top:-30px; }</style>';

		// echo '<div class="row"><div class="small-12 columns">';
		// echo '<ul class="small-block-grid-4" data-clearing>';

		// foreach ($albums['data'] as $album) 
		// {
		// 	//echo $album['id'];
		// 	if(strpos($album['name'], 'EC13: Album 1') !== false) 
		// 	{
		// 		$photos = Cache::rememberForever('fb-album-photos-' . $album['id'], function() use ($album)
		// 		{
		// 		    return $this->facebook->api('/' . $album['id'] . '/photos?fields=id,picture,width,height,source&limit=' . $album['count']);
		// 		});

		// 		foreach ($photos['data'] as $photo) 
		// 		{
		// 			//$class = ($photo['height'] > $photo['width']) ? 'vertical' : '';
		// 			$margin = ($photo['height'] > $photo['width']) ? 46 : 0;

		// 			echo '<li><a class="th" style="overflow:hidden" href="' . $photo['source'] . '"><img src="' . $photo['picture'] . '" class="" style="margin-bottom:-' . $margin . 'px" /></a></li>';
		// 		}
		// 	}

		


		// }
		// echo '</ul>';
		// echo "</div></div>";

		// echo '<script src="/bower_components/jquery/jquery.js"></script>';
	 //    echo '<script src="/bower_components/foundation/js/foundation.min.js"></script>';
	 //    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-countdown/1.6.3/jquery.countdown.min.js"></script>';
	 //    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-parallax/1.1.3/jquery-parallax-min.js"></script>';
	 //    echo '<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>';
	 //    echo '<script src="/js/jquery.appear.js"></script>';

	 //    echo '<script src="/js/masonry.pkgd.min.js"></script>';
	 //    echo '<script src="/js/nivo-lightbox.js"></script>';

	 //    echo '<script src="/js/app.js"></script>';
		}

	}

	public function album()
    {
        return $this->hasOne('Album','id');
    }

}