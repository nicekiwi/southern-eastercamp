<?php

class FaqCategory extends Eloquent {

	protected $table = 'faq_categories';

	public function questions()
    {
        return $this->hasMany('Faq','category_id');//->where('public', 1);
    }

}