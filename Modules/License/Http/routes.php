<?php

Route::group(['middleware' => 'web', 'prefix' => 'license', 'namespace' => 'Modules\License\Http\Controllers'], function()
{
    Route::get('/', 'LicenseController@index');
});
