<?php

Route::group(['middleware' => 'web', 'prefix' => 'license', 'namespace' => 'Modules\License\Http\Controllers'], function()
{
    Route::get('/', 'LicenseController@index')->name('license');
    Route::post('update/{id}', 'LicenseController@update')->name('update');
    Route::get('edit/{id}', 'LicenseController@show');
    Route::post('revoke/{id}', 'LicenseController@revoke');
    Route::post('sendreport', 'LicenseController@sendReport');
});
