<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::group(['prefix' => 'dashboard'], function ()
{
    Route::get('/', 'HomeController@index');
    Route::get('/account', 'AccountController@index');
    Route::get('/help', 'HelpController@index');
});

Route::group(['prefix' => 'admin'], function ()
{
    Route::get('/', 'AdminController@index');
    Route::resource('course', 'CourseController');
});