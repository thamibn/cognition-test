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

//public
Route::get('/ticket/status', 'TicketController@ticketStatusForm')->name('ticket_status_form');
Route::post('/ticket/status', 'TicketController@postGetStatus')->name('post_ticket_status');
Route::get('/ticket/status/{ticket_number}', 'TicketController@status')->name('ticket_status');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function (){
Route::get('/new/ticket', 'TicketController@create')->name('new_ticket');
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::post('/tickets', 'TicketController@store')->name('create_ticket');
Route::post('/tickets/update/status/{id}', 'TicketController@update')->name('update_status');
});