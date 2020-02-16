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
    return view('front');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/new/ticket', 'TicketController@create')->name('new_ticket');
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::post('/tickets', 'TicketController@store')->name('create_ticket');
