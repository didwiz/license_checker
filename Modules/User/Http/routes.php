<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/dashboard', 'UserController@index')->name('user');
});



