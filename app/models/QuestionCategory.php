<?php

class QuestionCategory extends Eloquent {

	protected $table = 'question_categories';

	public function questions()
    {
        return $this->hasMany('Question','category_id');//->where('public', 1);
    }

}