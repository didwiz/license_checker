<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/dashboard', 'UserController@index')->name('user');
});

Route::group(['middleware' => ['web','auth'], 'prefix' => 'user/admin', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('create', 'UserController@createAdmin')->name('create-admin');
    Route::post('add', 'UserController@addAdmin')->name('add-admin');
});



