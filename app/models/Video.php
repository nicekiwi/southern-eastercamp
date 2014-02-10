<?php

class Video extends Eloquent {

	public function playlist()
    {
        return $this->hasOne('Playlist','id','playlist_id');
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