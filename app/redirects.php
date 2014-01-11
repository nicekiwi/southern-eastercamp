<?php

Route::get('registration', function(){ 
    return Redirect::to('/register', 301); 
});

Route::get('faq/question/{id}', function($id = null){ 
    return Redirect::to('/help/faq/question/'. $id , 301); 
})->where('id', '[0-9]+');

Route::get('faq/{category?}', function($category = null){ 
    return Redirect::to('/help/faq/'. $category , 301); 
})->where('category', '[A-Za-z]+');