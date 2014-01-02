<?php

// composers

View::composer('*', function($view)
{
    $browser = BrowserDetect::getInfo();

    $view->with('browser', $browser->data);
});