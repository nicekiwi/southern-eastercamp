<?php

class Playlist extends Eloquent {

	public function videos()
    {
        return $this->hasMany('Video','playlist_id')->where('public', 1);
    }

}