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