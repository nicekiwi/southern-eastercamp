<?php

// composers

View::composer('layouts.master', function($view)
{
    $questions = QuestionCategory::orderBy('order','asc')->get(['title','slug']);
    $supporters = Supporter::orderBy(DB::raw('RAND()'))->take(7)->get();

    $view->with(compact('questions','supporters'));
});

View::composer('partials.footer-photos', function($view)
{
	$photos = Photo::where('album_id','2')
					->orderBy(DB::raw('RAND()'))
					->take(12)
					->get();

	$view->with('photos', $photos);
});