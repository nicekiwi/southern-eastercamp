<?php

// composers

View::composer('layouts.master', function($view)
{
    $browser = BrowserDetect::getInfo();
    $browser = $browser->data;

    $questions = QuestionCategory::orderBy('order','asc')->get(['title']);

    $view->with(compact(['browser','questions']));
});

// View::composer('*', function($view)
// {
// 	$page = Page::where('slug', Request::path())->first();

// 	$view->with(compact('page'));
// });

View::composer('partials.footer-photos', function($view)
{
	$photos = Photo::where('album_id','10151439168936716')
					->where('height','<','120')
					->orderBy(DB::raw('RAND()'))
					->take(12)
					->get();

	$view->with('photos', $photos);
});