<?php
class News extends Eloquent {

	public static function get_news()
	{
		return DB::table('news')
			->orderBy('created_time', 'desc')
			->where('fb_id','!=','')
			->where('status_type','!=','created_event')
			->where('created_time','>','2012-11-01')
			->take(15)
			->get();
	}

	public static function update_news_db()
	{
		$facebook = IoC::resolve('facebook-sdk');

	    $remote_data = $facebook->api('/southerneastercamp/posts?fields=message,link,picture,source,story,status_type,created_time,description,name,caption,type&limit=200&start=0');

		$local_data = DB::table('news')->order_by('created_time','desc')->take(1)->get();

		if($remote_data !== null && $local_data !== null)
		{
			// Prepre $news_post for db insertion.
			foreach($remote_data['data'] as $key => $value)
			{
				if(DB::table('news')->where('fb_id', '=', $value['id'])->count() == 0)
				{
					$news_post = null;

					if(isset($value['id'])) $news_post['fb_id'] = $value['id'];
					if(isset($value['message'])) $news_post['message'] = News::makeLinks($value['message']);
					if(isset($value['link'])) $news_post['link'] = $value['link'];

					if(isset($value['picture']))
					{
						$picture = str_replace('_s.jpg','_n.jpg', $value['picture']);

						for ($i = 1; $i <= 9; $i++) {
						   $picture = str_replace('hphotos-ak-snc'.$i.'/','hphotos-ak-snc'.$i.'/s480x480/', $picture);
						}

						$news_post['picture'] = $picture;
					}

					if(isset($value['picture']))
					{
						$picture_large = str_replace('_s.jpg','_n.jpg', $value['picture']);
						$picture_large = str_replace('s480x480/','/', $picture_large);

						$news_post['picture_large'] = $picture_large;
					}

					if(isset($value['type'])) $news_post['type'] = $value['type'];
					if(isset($value['source'])) $news_post['source'] = $value['source'];
					if(isset($value['source']) && stripos($value['source'], "bandcamp") !== false)
					{
						if(stripos($value['source'], "album=") !== false){$pattern = 'album=';}else{$pattern = 'track=';}

						$bc_str = $value['source'];
						$bc_str = substr($bc_str, strpos($bc_str, $pattern));
						$bc_str = substr($bc_str, 0,(strpos($bc_str, '/')));

						$news_post['source_bandcamp'] = $bc_str;
						$news_post['type'] = 'music';
					}
					if(isset($value['story'])) $news_post['story'] = News::makeLinks($value['story']);
					if(isset($value['status_type'])) $news_post['status_type'] = $value['status_type'];
					if(isset($value['created_time'])) $news_post['created_time'] = $value['created_time'];
					if(isset($value['description'])) $news_post['link_description'] = $value['description'];
					if(isset($value['name'])) $news_post['link_name'] = $value['name'];
					if(isset($value['caption'])) $news_post['link_caption'] = News::makeLinks($value['caption']);
					

					// Now we proccess data that needs it.

					if(isset($value['name']) && isset($value['status_type']) && $value['status_type'] == 'added_photos')
					{
						$albmData = explode('&',$news_post['link']);
						$news_post['link'] = 'http://www.facebook.com/media/set/?'.$albmData[1];
						$news_post['type'] = 'photos';
					}
					
					//if(strtotime($local_data['0']->created_time) < strtotime($value['created_time']))
					//{
						DB::table('news')->insert($news_post);
					//}
				}
			}

			return true;
		}
		else
		{
			return false;
		}
	}

	public static function makeLinks($input) 
	{
	    $linkExp = '/\b((https?|ftp|file):\/\/|www\.|ftp\.)[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/si';
	    $emailExp = '/(\S+@\S+\.\S+)/i';

	    $input = preg_replace($linkExp, '<a href="\0" title="Visit: \0" target="_blank">\0</a>', $input);
	    $input = preg_replace($emailExp, '<a href="mailto:$1" title="Email: $1" target="_blank">$1</a>', $input);

	    $input = str_replace('href="www', 'href="http://www', $input);

	    return $input;
	}

	function print_r2($val)
	{
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
	}
}