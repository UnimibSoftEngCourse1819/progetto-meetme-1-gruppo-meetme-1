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
Route::delete('/events/{event}/partecipants/{email}', 'PartecipantsController@destroy')->name('events.partecipants.delete');

Route::prefix('/surveys')->name('surveys.')->group(function () {
    Route::get('/{survey}', 'SurveysController@show')->name('show');
    Route::post('/{survey}', 'SurveysController@answer')->name('answer');
});

Route::prefix('/accounts')->name('account.')->group(function () {
    Route::get('/settings/edit', 'SettingsController@edit')->name('settings');
    Route::patch('/settings/edit', 'SettingsController@update')->name('settings.update');

	Route::resource('emails', 'EmailsController')->only([
		'store', 'update', 'destroy'
	]);

    // Route::get('/users', 'UsersController@index')->name('users');
    // Route::patch('/users', 'UsersController@update')->name('users.update');

    // Route::get('/calendars', 'CalendarsController@index')->name('calendars');
    // Route::post('/calendars/sync', 'CalendarsController@sync')->name('calendars.sync');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
