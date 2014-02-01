<?php

class Post extends Eloquent 
{
	private $facebook;

	function __construct() {
		// Setup Facebook Instance
		$this->facebook = new Facebook([
			'appId'  => Config::get('keys.facebook.app_id'),
			'secret' => Config::get('keys.facebook.secret_key'),
		]);
	}

	public function download_posts()
	{
		// Fields we want from Facebook
		$facebook_fields = 'message,link,picture,source,story,status_type,created_time,description,name,caption,type';
		
		// Get Wall posts by the public page
		$facebook_posts = $this->facebook->api('/'. Config::get('keys.facebook.page') .'/posts?fields='. $facebook_fields .'&limit=50&start=0&date_format=U');

		$facebook_posts = $facebook_posts['data'];

		// Make sure facebook returned some posts
		if(count($facebook_posts) === 0) return false;

		// Prepre $local_post for db insertion.
		foreach($facebook_posts as $facebook_post)
		{
			// Check if post is already in database by id
			if(Post::where('fb_id', $facebook_post['id'])->count() === 0) {

				// Setup new post
				$local_post = new Post;

				// ID
				$local_post->fb_id = $facebook_post['id'];

				// Message
				if(isset($facebook_post['message']))
					$local_post->message = $this->makeLinks($facebook_post['message']);

				// Link
				if(isset($facebook_post['link']))
					$local_post->link = $facebook_post['link'];

				// Picture
				if(isset($facebook_post['picture']))
					$local_post->picture = $this->makePicture($facebook_post['picture']);

				// Type
				if(isset($facebook_post['type'])) 
					$local_post->type = $facebook_post['type'];

				// Source
				if(isset($facebook_post['source'])) {
					$local_post->source = $facebook_post['source'];

					// If bandcamp found in source, extract Album/Track ID
					if(stripos($facebook_post['source'], "bandcamp") !== false) {
						$local_post->source_bandcamp = $this->extractBandcamp($facebook_post['source']);
						$local_post->type = 'music';
					}
				}

				// Story
				if(isset($facebook_post['story']))
					$local_post->story = $this->makeLinks($facebook_post['story']);

				// Status Type
				if(isset($facebook_post['status_type']))
					$local_post->status_type = $facebook_post['status_type'];

				// Created Time
				if(isset($facebook_post['created_time']))
					$local_post->posted_at = $facebook_post['created_time'];

				// Description
				if(isset($facebook_post['description']))
					$local_post->link_desc = $facebook_post['description'];

				// Name
				if(isset($facebook_post['name']))
					$local_post->link_name = $facebook_post['name'];

				// Caption
				if(isset($facebook_post['caption']))
					$local_post->link_caption = $this->makeLinks($facebook_post['caption']);
				

				// Now we proccess data that needs it.
				if(isset($facebook_post['status_type']) && $facebook_post['status_type'] == 'added_photos')
				{
					$local_post->link = $this->extractAlbumLink($local_post->link);
					$local_post->type = 'photos';
				}
				
				// Save new Post.
				$local_post->save();
			}
		}
	}

	function makeLinks($input) 
	{
	    $linkExp = '/\b((https?|ftp|file):\/\/|www\.|ftp\.)[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/si';
	    $emailExp = '/(\S+@\S+\.\S+)/i';

	    // Add links to plain text
	    $input = preg_replace($linkExp, '<a href="\0" title="Visit: \0" target="_blank">\0</a>', $input);
	    
	    // Add email mailto links to plain text
	    $input = preg_replace($emailExp, '<a href="mailto:$1" title="Email: $1" target="_blank">$1</a>', $input);

	    // Prefix links with http://
	    $input = str_replace('href="www', 'href="http://www', $input);

	    return $input;
	}

	function makePicture($input)
	{
		// Change file to larger extension
		return str_replace('_s.jpg','_o.jpg', $input);
	}

	function extractBandcamp($input)
	{
		$pattern = 'track=';

		if(stripos($input, "album=") !== false) $pattern = 'album=';

		$bc_str = $input;
		$bc_str = substr($bc_str, strpos($bc_str, $pattern));
		$bc_str = substr($bc_str, 0,(strpos($bc_str, '/')));

		return $bc_str;
	}

	function extractAlbumLink($input)
	{
		$url = explode('&', $input);
		return 'http://www.facebook.com/media/set/?' . $url[1];
	}

	public function getDates()
	{
	    return array('posted_at','created_at','updated_at');
	}
}