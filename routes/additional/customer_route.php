<?php

/*Add customer*/
Route::post('/addCustomer', [
    'uses' => 'CustomersController@addCustomer',
    'as' => 'addCustomer',
    'middleware' => 'auth'
    ]
);

Route::get('/removeCustomer/{customer_id}', [
    'uses' => 'CustomersController@removeCustomer',
    'as' => 'removeCustomer',
    'middleware' => 'auth'
    ]
);