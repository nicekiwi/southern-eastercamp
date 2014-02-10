<?php
class Question extends Eloquent {

	public function category()
    {
        return $this->hasOne('QuestionCategory','id','category_id');
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