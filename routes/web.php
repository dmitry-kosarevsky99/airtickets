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
//Route::get('/reviews','ReviewController@index'); 
//Route::get('/reviews/review_create', 'ReviewController@create');//->middleware('auth');
 Route::resource('reviews','ReviewController');
Route::get('admin','AdminController');
