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
Route::get('admin','AdminController');
