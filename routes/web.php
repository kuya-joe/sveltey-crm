<?php

use Illuminate\Support\Facades\Route;

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


// # Auth::routes();

// Auth
Route::get('login')->name('login')->uses('Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login')->name('login.attempt')->uses('Auth\LoginController@login')->middleware('guest');
Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');

// Home / Dashboard
Route::get('/home')->name('home')->uses('DashboardController')->middleware('auth');


// Customers
Route::get('customers')->name('customers')->uses('CustomersController@index')->middleware('remember', 'auth');
Route::get('customers/create')->name('customers.create')->uses('CustomersController@create')->middleware('auth');
Route::post('customers')->name('customers.store')->uses('CustomersController@store')->middleware('auth');
Route::get('customers/{customer}/edit')->name('customers.edit')->uses('CustomersController@edit')->middleware('auth');
Route::put('customers/{contact}')->name('customers.update')->uses('CustomersController@update')->middleware('auth');
Route::delete('customers/{contact}')->name('customers.destroy')->uses('CustomersController@destroy')->middleware('auth');
Route::put('customers/{contact}/restore')->name('customers.restore')->uses('CustomersController@restore')->middleware('auth');

// 500 error
Route::get('500', function () {
    // Force debug mode for this endpoint in the demo environment
    if (App::environment('demo')) {
        Config::set('app.debug', true);
    }

    echo $fail;
});
