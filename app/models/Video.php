<?php

class Video extends Eloquent {

	public function playlist()
    {
        return $this->hasOne('Playlist','id','playlist_id');
    }
}