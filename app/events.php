<?php

// Save user last login time.
Event::listen('user.login', function($user)
{
    $user->last_login = new DateTime;

    $user->save();
});