<?php
class Faqs extends Eloquent {

	public static function get_faqs($cat)
	{
		return DB::table('faqs')
			->where('cat', '=', $cat)
			->where('auth', '=', 1)
			->order_by('views','desc')
			->order_by('helpful_yes','desc')
			->get(array('id', 'desc', 'cat'));
	}

	public static function get_faq($id)
	{
		$data = DB::table('faqs')->where('id', '=', $id)->get(array('id', 'cat', 'desc', 'answer' , 'tags', 'helpful_yes', 'helpful_no'));

		if(!$data)
		{
			return false;
		}

		$faq = $data['0'];

		$title = substr($faq->desc, 0, 80);
		$title = trim($title);

		$faq->meta_title = $title;

		$description = strip_tags($faq->answer);
		$description = preg_replace('/\s\s+/', ' ', $description);
		$description = substr($description, 0, 150);

		$faq->meta_desc = $description;
		$faq->helpful_total = $faq->helpful_yes + $faq->helpful_no;


		//if($faq->helpful_total > 0 ? $faq->people = 'people') $faq

		return $data;
	}

	public static function get_query($searchquery)
	{
		if($searchquery == '') return false;

		$new_query = strtolower($searchquery);

		$swaplist = array('where'=>'location%20address','old'=>'history%20time','age'=>'years%20born','when'=>'date%20time','there'=>'directions','easter%20camp'=>'','eastercamp'=>'','%20'=>' ');

		foreach ($swaplist as $key => $value) {$new_query = str_replace($key,$value,$new_query);}

		return DB::query('SELECT `id`, `desc` FROM `faqs` WHERE MATCH (`tags`,`desc`) AGAINST (?) ORDER BY `views`,`helpful_yes` DESC LIMIT 15', explode('%20', $new_query));
	}

	public static function get_popular_questions($num)
	{
		return DB::table('faqs')
			->where('auth', '=', 1)
			->where('id','!=','5155')
			->take($num)
			->order_by('views','desc')
			->get(array('id', 'desc'));
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
}