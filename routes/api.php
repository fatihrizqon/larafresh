<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['api']], function(){

    Route::post('/auth/signup', 'AuthController@signup');
    Route::post('/auth/signin', 'AuthController@signin');

    Route::group(['middleware' => ['jwt.auth']], function(){
        Route::get('/auth/signout', 'AuthController@signout');
    });
});
