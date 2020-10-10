<?php
// Capitals
Route::get('/capital', 'CapitalController@index') ->name('capital.index');

/*Route::get('/capital/{us}', 'CapitalController@show')
    ->where('user', '[0-9]+')
    ->name('Capital.show');*/

Route::get('/capitalcreate', 'CapitalController@create')->name('capitalcreate');
Route::post('capitalstore', 'CapitalController@store')->name('capitalstore');

Route::get('/capitaledit', 'CapitalController@edit')->name('Capital.edit');
Route::put('/capitalup/{Capital}', 'CapitalController@update')->name('Capitalup');
Route::get('/capitalshow/{ano}', 'CapitalController@show')->name('Capital.show');
Route::get('capitalexports/{ano}/{pd}', 'CapitalController@exports')->name('capitalexports');

Route::get('/papelera', 'CapitalController@trashed')->name('papelera');
Route::get('Capitals/trash/{id}', ['as' => 'Capitals/trash', 'uses' => 'CapitalController@trash']);
//Route::delete('/usuarios/{id}', 'CapitalController@destroy')->name('users.destroy');
Route::get('users/restore/{id}', ['as' =>  'Capital/restore', 'uses' => 'CapitalController@restore']);
Route::get('/capitalexcel','CapitalController@export')->name('capitalexcel');

//Rutas de valida el Capital propio
Route::get('/valcapitaledit', 'ValcapitalController@edit')->name('valcapital.edit');
Route::put('/valcapitalup/{Capital}', 'ValcapitalController@update')->name('valcapitalup');

Route::get('capital/shownotas/{id}','CapitalController@shownotas')->name('capitalshownotas');
Route::put('capital/updatenota/{id}',['as' =>  'capital/updatenota', 'uses' => 'CapitalController@updatenota']);
