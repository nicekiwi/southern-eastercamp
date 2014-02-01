<?php

// composers

View::composer('layouts.master', function($view)
{
    $questions = QuestionCategory::orderBy('order','asc')->get(['title','slug']);
    $view->with(compact('questions'));
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