<?php
Route::get('/', 'IndexController@index')->name('index');
Auth::routes();

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('accounts', 'AccountController');
    Route::resource('admin', 'AdminController');
    Route::resource('courses', 'CourseController');
    Route::resource('help', 'HelpController');
});