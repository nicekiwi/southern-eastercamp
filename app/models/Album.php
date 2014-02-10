<?php

class Album extends Eloquent {

	private $facebook;

	function __construct() 
	{
		$this->facebook = new Facebook([
			'appId'  => Config::get('keys.facebook.app_id'),
			'secret' => Config::get('keys.facebook.secret_key'),
		]);
	}

	public function get_fb_albums() 
	{
		$facebook_fields = 'id,name,count';
		$facebook_albums = $this->facebook->api('/'. Config::get('keys.facebook.page') .'/albums?fields='. $facebook_fields .'&limit=100');

		return $facebook_albums['data'];
	}

	public function get_fb_photos($fb_album_id) 
	{
		$facebook_fields = 'id,picture,width,height';
		$facebook_photos = $this->facebook->api('/' . $fb_album_id . '/photos?fields=' . $facebook_fields . '&limit=500');

		return $facebook_photos['data'];
	}

	public function import_photos() {
		
	}

	public function photos()
    {
        return $this->hasMany('Photo','album_id');
    }
    
    public function updatedBy()
    {
        return $this->hasOne('User','id','updated_by');
    }

    public function createdBy()
    {
        return $this->hasOne('User','id','created_by');
    }

}