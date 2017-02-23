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
/*Application routes*/
Route::get('/', function () {
    return view('home');
})->name('users')->middleware('auth');

Route::get('/applications', function () {
    return view('applications');
})->name('applications')->middleware('auth');




/*Security routes*/
Route::get('/home', 'HomeController@index');

Route::get('/login', function (){
    return view('login');
})->name('login');

Route::get('/register', function (){
    return view('auth.register');
})->name('register')->middleware('auth');

Route::post('/register', [
        'uses' => 'UserController@postSignUp',
        'as' => 'register'
    ]
);

Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logOut'
    ]
);



Route::post('/login', [
        'uses' => 'UserController@postSignIn',
        'as' => 'login'
    ]
);

/*Turned off routes*/
//Auth::routes();