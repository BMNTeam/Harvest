<?php

/*Add culture*/

Route::post('/addCulture', [
        'uses' => 'CultureController@addCulture',
        'as' => 'addCulture'
    ]
)->middleware('auth');

Route::get('/addCulture', [
        'uses' => 'CultureController@getCulture',
        'as' => 'addCulture'
    ]
)->middleware('auth');




/*Remove culture*/
Route::get('/removeCulture/{culture_name}', [
        'uses' => 'CultureController@removeCulture',
        'as' => 'removeCulture'
    ]
)->middleware('auth');
