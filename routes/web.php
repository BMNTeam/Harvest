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

include('additional/addToDatabase.php');

Route::get('/', [
        'uses' => 'CustomersController@getCustomers',
        'as' => 'users',
        'middleware'    => 'auth'
    ]
);

Route::get('/applications', [
        'uses'       => 'OrdersController@getOrders',
        'as'         => 'applications',
        'middleware' => 'auth'
    ]
);



/*Security routes*/
Route::get('/home', 'HomeController@index');

Route::get('/login', function (){
    return view('login');
})->name('login');

Route::get('/register', function (){
    return view('auth.register');
})->name('register');

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


Route::get('/cultures', [
        'uses'       => 'CultureController@view',
        'as'         => 'cultures',
        'middleware' => 'auth'
    ]
);


Route::post('/login', [
        'uses' => 'UserController@postSignIn',
        'as' => 'login'
    ]
);

/*Turned off routes*/
//Auth::routes();