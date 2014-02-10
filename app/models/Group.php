<?php

class Group extends Eloquent {

	public function users()
    {
        return $this->hasMany('User','group_id','id');
    }
}