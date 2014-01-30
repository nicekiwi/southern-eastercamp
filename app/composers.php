<?php

// composers

View::composer('layouts.master', function($view)
{
    $browser = BrowserDetect::getInfo();
    $browser = $browser->data;

    $questions = QuestionCategory::orderBy('order','asc')->get(['title']);

    $view->with(compact(['browser','questions']));
});

View::composer('partials.footer-photos', function($view)
{
	$photos = Photo::where('album_id','10151439168936716')
					->where('height','<','120')
					->orderBy(DB::raw('RAND()'))
					->take(12)
					->get();

	$view->with('photos', $photos);
});

// View::composer('downloads', function($view)
// {
// 	$downloads = Download::orderBy('order')->get();

// 	$view->with('downloads', $downloads);
// });

// View::composer('videos', function($view)
// {
// 	$videos = Video::get();

// 	$view->with(compact('videos'));
// });