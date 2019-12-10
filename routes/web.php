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

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('users', 'UserController@index')->name('users.index');
        Route::post('users', 'UserController@store')->name('users.store');
        Route::get('users/create', 'UserController@create')->name('users.create');
        Route::get('users/{user}', 'UserController@show')->name('users.show');
        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
        Route::get('users/{user}', 'UserController@edit')->name('users.edit');
        Route::put('users/{user}', 'UserController@update')->name('users.update');
    });

    Route::middleware(['admin', 'manager'])->group(function () {
        Route::get('tellers', 'TellerController@index')->name('tellers.index');
        Route::post('tellers', 'TellerController@store')->name('tellers.store');
        Route::get('tellers/create', 'TellerController@create')->name('tellers.create');
        Route::get('tellers/{user}', 'TellerController@show')->name('tellers.show');
        Route::delete('tellers/{user}', 'TellerController@destroy')->name('tellers.destroy');
        Route::get('tellers/{user}', 'TellerController@edit')->name('tellers.edit');
        Route::put('tellers/{user}', 'TellerController@update')->name('tellers.update');
    });

    Route::middleware(['admin', 'manager', 'teller'])->group(function () {
        Route::get('accounts', 'AccountController@index')->name('accounts.index');
        Route::post('accounts', 'AccountController@store')->name('accounts.store');
        Route::get('accounts/create', 'AccountController@create')->name('accounts.create');
        Route::get('accounts/{user}', 'AccountController@show')->name('accounts.show');
        Route::delete('accounts/{user}', 'AccountController@destroy')->name('accounts.destroy');
        Route::get('accounts/{user}', 'AccountController@edit')->name('accounts.edit');
        Route::put('accounts/{user}', 'AccountController@update')->name('accounts.update');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
