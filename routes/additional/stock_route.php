<?php

/*Add element to stock */
Route::post('/addToStock', [
        'uses' => 'CultureController@addElementToStock',
        'as' => 'addToStock',
        'middleware' => 'auth'
    ]
);

Route::get('/removeFromStock/{sock_id}', [
        'uses' => 'StockController@removeStockElement',
        'as' => 'removeFromStock',
        'middleware' => 'auth'
    ]
);

Route::post('/editStockElement', [
        'uses' => 'StockController@editStockElement',
        'as' => 'editStockElement',
        'middleware' => 'auth'
    ]
);

