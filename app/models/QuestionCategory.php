<?php

class QuestionCategory extends Eloquent {

	protected $table = 'question_categories';

	public function questions()
    {
        return $this->hasMany('Question','category_id','id');
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