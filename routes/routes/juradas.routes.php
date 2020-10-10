<?php

//Juradas
Route::get('/juradas', 'JuradaController@index')
->name('juradas.index');

Route::get('createjurada',['as' => 'empresas', 'uses' => 'JuradaController@create','as' => 'createjurada']);
Route::post('storejurada',['uses' => 'JuradaController@store','as' => 'storejurada']);
Route::get('jurada/edit/{id}',['uses' => 'JuradaController@edit','as' =>'juradaedit']);
Route::put('jurada/update/{id}', ['as' =>  'jurada/update', 'uses' => 'JuradaController@update']);

Route::get('juradashownotas/{id}/{tip}','JuradaController@showinfo')->name('juradashownotas');
Route::get('infojuradas','JuradaController@show')->name('infojuradas');

Route::get('showedo/{id}/{jura}','JuradaController@showedo')->name('showedo');
Route::put('updatedo/{id}',['uses' => 'JuradaController@ubdateestado','as' => 'updatedo']);

Route::get('jurada/Exports', 'JuradaController@Exports')->name('jurada/Exports');
