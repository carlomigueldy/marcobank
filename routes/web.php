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
    Route::post('accounts/withdraw/{account}', 'AccountController@accountWithdraw')->name('accounts.accountWithdraw');
    
    Route::middleware('admin')->group(function () {
        Route::get('users', 'UserController@index')->name('users.index');
        Route::post('users', 'UserController@store')->name('users.store');
        Route::get('users/create', 'UserController@create')->name('users.create');
        Route::get('users/{user}', 'UserController@show')->name('users.show');
        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
        Route::get('users/{user}', 'UserController@edit')->name('users.edit');
        Route::put('users/{user}', 'UserController@update')->name('users.update');
    });

    Route::middleware('manager')->group(function () {
        Route::get('tellers', 'TellerController@index')->name('tellers.index');
        Route::post('tellers', 'TellerController@store')->name('tellers.store');
        Route::get('tellers/create', 'TellerController@create')->name('tellers.create');
        Route::get('tellers/{user}', 'TellerController@show')->name('tellers.show');
        Route::delete('tellers/{user}', 'TellerController@destroy')->name('tellers.destroy');
        Route::get('tellers/{user}', 'TellerController@edit')->name('tellers.edit');
        Route::put('tellers/{user}', 'TellerController@update')->name('tellers.update');
    });

    Route::middleware('teller')->group(function () {
        Route::get('accounts', 'AccountController@index')->name('accounts.index');
        Route::post('accounts', 'AccountController@store')->name('accounts.store');
        Route::get('accounts/create', 'AccountController@create')->name('accounts.create');
        Route::get('accounts/{account}', 'AccountController@show')->name('accounts.show');
        Route::delete('accounts/{account}', 'AccountController@destroy')->name('accounts.destroy');
        Route::get('accounts/{account}', 'AccountController@edit')->name('accounts.edit');
        Route::put('accounts/{account}', 'AccountController@update')->name('accounts.update');
        Route::post('accounts/deposit/{account}', 'AccountController@accountDeposit')->name('accounts.accountDeposit');
        Route::get('accounts/withdraw/{account}', function ($id) {
            $account = App\Account::find($id);
            $account->user;

            return view('accounts.withdraw', compact('account'));
        })->name('accounts.withdrawView');
        Route::get('accounts/deposit/{account}', function ($id) {
            $account = App\Account::find($id);
            $account->user;

            return view('accounts.deposit', compact('account'));
        })->name('accounts.depositView');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
