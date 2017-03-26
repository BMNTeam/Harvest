<?php


Route::get('/orders',[
        'uses'          => 'OrdersController@getAllElementsInOrders',
        'as'            => 'orders',
        'middleware'    => 'auth'
    ]
);


Route::post('/orders_add',[
        'uses'          => 'OrdersController@createElementInOrder',
        'as'            => 'add_order',
        'middleware'    => 'auth'
    ]
);

Route::get('/remove_order/{id}',[
        'uses'          => 'OrdersController@removeOrder',
        'as'            => 'remove_order',
        'middleware'    => 'auth'
    ]
);


Route::post('/finish_order',[
        'uses'          => 'OrdersController@finishOrder',
        'as'            => 'finishOrder',
        'middleware'    => 'auth'
    ]
);




