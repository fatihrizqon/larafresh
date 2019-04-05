<?php

Route::get('/', 'AppController@index');
Route::get('/register', 'AppController@register')->name('register');
Route::get('/login', 'AppController@login')->name('login');