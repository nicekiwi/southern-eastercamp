<?php

// composers

View::composer('layouts.master', function($view)
{
    $questions = QuestionCategory::orderBy('order','asc')->get(['title','slug']);
    $view->with(compact('questions'));
});

View::composer('partials.footer-media', function($view)
{
	$photos = Photo::where('album_id','1')->orderBy(DB::raw('RAND()'))->take(4)->get();
	$video = Video::orderBy(DB::raw('RAND()'))->first();

	$view->with(compact('photos','video'));
});

View::composer('partials.footer-supporters', function($view)
{
	$supporters = Supporter::orderBy(DB::raw('RAND()'))->take(7)->get();
	$view->with(compact('supporters'));
});