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
    return view('home');
})->name('users')->middleware('auth');

Route::get('/applications', function () {
    return view('applications');
})->name('applications');

Route::get('/login', function (){
    return view('login');
})->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index');
