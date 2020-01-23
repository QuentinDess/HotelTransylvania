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

use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','IndexController@showIndex')->name('index');
Route::get('/rooms', 'RoomController@index')->name('showRoom');
Route::get('/room/{id}','RoomController@showOneRoom')->name('booking');
Route::post('/register','Auth\RegisterController@store')->name('postUser');
 //route d'espace personnel
 Route::get('/homeClient/{id}','UserController@showClient')->name('homeClient');
 Route::get('/homeStaff','UserController@showStaff')->name('homeStaff');
 Route::get('/homeAdmin','UserController@showAdmin')->name('homeAdmin');
 //route crud utilisateur depuis amdin
 Route::post('/deleteUser/{id}','UserController@deleteUser')->name('deleteUser');
 Route::post('/editUser/{id}','UserController@editUser')->name('editUser');
 Route::post('/updateUser/{id}','UserController@updateUser')->name('updateUser');
 Route::post('/addUser','UserController@addUser')->name('addUser');
 Route::get('/showUserRegister','UserController@showRegister')->name('showRegister');
 //route crud room depuis amdin
 Route::post('/deleteRoom/{id}','RoomController@deleteRoom')->name('deleteRoom');
 Route::post('/editRoom/{id}','RoomController@editRoom')->name('editRoom');
 Route::post('/updateRoom/{id}','RoomController@updateRoom')->name('updateRoom');
 Route::get('/createRoom','RoomController@createRoom')->name('createRoom');
 Route::post('/postRoom','RoomController@postRoom')->name('postRoom');
