<?php

class Photo extends Eloquent {

	public function album()
    {
        return $this->hasOne('Album','id');
    }

}