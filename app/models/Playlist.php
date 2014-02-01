<?php

class Playlist extends Eloquent {

	public function videos()
    {
        return $this->hasMany('Video','playlist_id')->where('public', 1);
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