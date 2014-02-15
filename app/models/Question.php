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

    public static function to_search_query($query)
   {
       $pat = '/[\s~`!#$%^:&*(){}\'\[\]\\\+-,]+/';
       $q_words = preg_split($pat, $query);
       $q_words2 = array();
 
       if (count($q_words) > 0)
       {
           foreach ($q_words as $val)
           {
               if (mb_strlen($val, 'utf-8') >= 3)
               {
                   //$val .= ':*'.$weight;
                   $q_words2[] = $val;
               }
           }
           return implode(' | ', $q_words2);
       }
   }
}