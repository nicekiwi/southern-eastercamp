<?php
class Question extends Eloquent {

	public static function get_query($searchquery)
	{
		if($searchquery == '') return false;

		foreach ($swaplist as $key => $value) {$new_query = str_replace($key,$value,$new_query);}

		return DB::query('SELECT `id`, `desc` FROM `faqs` WHERE MATCH (`tags`,`desc`) AGAINST (?) ORDER BY `views`,`helpful_yes` DESC LIMIT 15', explode('%20', $new_query));

		//$this->where()->orderBy('helpful_yes')->take(15);
	}

	public static function question_helpful($id)
	{
		if(!Cookie::has('vote-'.$id))
		{
			Cookie::put('vote-'.$id, '1');

			if(Input::has('vote') && Input::get('vote') == '1'){
				return DB::query("UPDATE `faqs` SET `helpful_yes` = helpful_yes+1 WHERE `id` = '$id'");
			}
			else
			{
				return DB::query("UPDATE `faqs` SET `helpful_no` = helpful_no+1 WHERE `id` = '$id'");
			}
			/*if(Input::has('vote') && Input::get('vote') == '0'){
				return DB::query("UPDATE `faqs` SET `helpful_no` = helpful_no+1 WHERE `id` = '$id'");
			}*/
		}

	}

	public static function mark_view($id)
	{
		if(!Cookie::has('view-'.$id))
		{
			Cookie::put('view-'.$id, '1');

			DB::query("UPDATE `faqs` SET `views` = views+1 WHERE `id` = '$id'");
		}
	}

	public function category()
    {
        return $this->hasOne('QuestionCategory','id','category_id');
    }
}