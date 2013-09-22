<?php

class NewsController extends BaseController {

	public function ShowNews()
	{
		$news = News::get_news();

		return View::make('news')->with(array('news' => $news));
	}

	public function action_update($auth = 'meow')
	{
		// Make sure only the authorized server can run command
		if($auth == '7222644869849844')
		{
	        if(News::update_news_db() === true)
	        {
	        	return Response::make('Update Success!', 200);
	        }
	        else
	        {
	        	return Response::make('Update has failed!', 200);
	        }
	    }
	    else
	    {
	    	return Event::first('404');
	    }
	}
}