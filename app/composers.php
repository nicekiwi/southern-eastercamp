<?php

// composers

View::composer('*', function($view)
{
    $browser = BrowserDetect::getInfo();

    $view->with('browser', $browser->data);
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