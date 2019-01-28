<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController');

Route::resource('events', 'EventsController');

Route::prefix('/survey')->name('surveys.')->group(function () {
    Route::get('/{survey}', 'SurveysController@show')->name('show');
    Route::post('/{survey}', 'SurveysController@answer')->name('answer');
});

Route::prefix('/account')->name('account.')->group(function () {
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::patch('/settings', 'SettingsController@update')->name('settings.update');

    Route::get('/users', 'UsersController@index')->name('users');
    Route::patch('/users', 'UsersController@update')->name('users.update');

    Route::get('/calendars', 'CalendarsController@index')->name('calendars');
    Route::post('/calendars/sync', 'CalendarsController@sync')->name('calendars.sync');
});
