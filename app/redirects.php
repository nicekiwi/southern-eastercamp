<?php

Route::get('registration', function(){ 
    return Redirect::to('/register', 301); 
});