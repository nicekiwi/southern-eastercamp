<?php

class Album extends Eloquent {

	private $facebook;

	function __construct() {
		$this->facebook = new Facebook([
			'appId'  => Config::get('keys.facebook.app_id'),
			'secret' => Config::get('keys.facebook.secret_key'),
		]);
	}

	public function get_fb_albums() {
		$albums = $this->facebook->api('/southerneastercamp/albums?fields=id,name,count&limit=100');

		return $albums['data'];
	}

	public function get_fb_photos($fb_album_id) {
		$photos = $this->facebook->api('/' . $fb_album_id . '/photos?fields=id,source,width,height&limit=500');

		return $photos['data'];
	}

	public function photos()
    {
        return $this->hasMany('Photo','album_id');
    }

}