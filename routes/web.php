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

// Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', 'UserController@getRegister');
Route::post('/register', 'UserController@postRegister')->name('register');

Route::get('/rent', 'PropertyController@rentProperty')->name('rent');
Route::get('/buy', 'PropertyController@buyProperty')->name('buy');

Route::get('/contracts', 'PropertyController@getContracts')->name('contracts');

Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin')->name('login');

Route::post('/logout', 'UserController@getLogout')->name('logout');


Route::get('/payments', 'HomeController@payments')->name('payments');

Route::get('/invoices', 'HomeController@invoices')->name('invoices');
