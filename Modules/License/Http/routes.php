<?php

Route::group(['middleware' => ['web','auth'], 'prefix' => 'license', 'namespace' => 'Modules\License\Http\Controllers'], function()
{
    Route::get('/', 'LicenseController@index')->name('license');
    Route::post('update/{id}', 'LicenseController@update')->name('update');
    Route::get('edit/{id}', 'LicenseController@show');
    Route::get('revoke/{id}', 'LicenseController@revokeLicense');
    Route::post('sendreport', 'LicenseController@sendReport');
    Route::get('create', 'LicenseController@create')->name('create');
    Route::post('add', 'LicenseController@store');

});

Route::group(['middleware' => ['web','auth'], 'prefix' => 'settings', 'namespace' => 'Modules\License\Http\Controllers'], function()
{

    Route::get('/', 'SettingsController@index')->name('settings');
    Route::get('update/{id}', 'SettingsController@showEmail');
    Route::post('edit/{id}', 'SettingsController@editEmail');
    Route::post('add-email', 'SettingsController@addEmail');
    Route::get('remove-email/{id}', 'SettingsController@removeEmail');
});
