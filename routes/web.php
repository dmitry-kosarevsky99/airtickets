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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','FlightController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('flight', 'FlightController', ['except' => ['edit', 'update', 'destroy']]);   
Route::resource('reviews','ReviewController');
// Custom route for deleting a review
Route::get('reviews/destroy/{reviewId}', 'ReviewController@destroy');
Route::resource('tickets','TicketController');
Route::get('tickets/create','TicketController@createUserTicket')->middleware('auth');
Route::post('tickets/create','TicketController@storeUserTicket');
Route::get('/user_tickets_show/{userID}','TicketController@showUserTickets');
Route::get('/ticket_create','TicketController@create')->middleware('admin');
Route::post('/ticket_create','TicketController@store')->middleware('admin');
Route::get('/tickets_show_admin','TicketController@index')->middleware('admin');
Route::get('/tickets_show_admin/edit_ticket/{ticketID}','TicketController@edit')->middleware('admin');
Route::put('/tickets_show_admin/edit_ticket/{ticketID}','TicketController@update')->name('updateTicket')->middleware('admin');
Route::get('/tickets_show_admin/destroy/{ticketID}','TicketController@destroy')->name('destroyTicket')->middleware('admin');
Route::get('/flights_show_admin','FlightController@showAdmin')->middleware('admin');
Route::get('/flights_show_admin/edit_flight/{flightID}','FlightController@edit')->middleware('admin');
Route::put('/flights_show_admin/update_flight/{flightID}','FlightController@update')->name('updateFlight')->middleware('admin');
Route::get('/flight_show_admin/destroy/{flightID}','FlightController@destroy')->name('destroyFlight')->middleware('admin');
Route::get('/flight_create','FlightController@create')->middleware('admin');
Route::post('/flight_create','FlightController@store')->middleware('admin');
Route::get('admin','AdminController');
Route::get('/users_all','AdminController@showAllUsers')->middleware('admin');
Route::get('/users_all/ban/{userID}','AdminController@ban')->middleware('admin');
Route::put('/users_all/ban/{userID}','AdminController@store')->name('storeBan')->middleware('admin');
Route::put('/users_all/{userID}','AdminController@unban')->name('unban')->middleware('admin');
