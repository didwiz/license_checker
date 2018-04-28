<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'license', 'namespace' => 'Modules\License\Http\Controllers'], function()
{
    Route::get('/', 'LicenseController@index')->name('license');
    Route::post('update/{id}', 'LicenseController@update')->name('update');
    Route::get('edit/{id}', 'LicenseController@show');
    Route::get('revoke/{id}', 'LicenseController@revokeLicense');
    Route::post('sendreport', 'LicenseController@sendReport');
});
