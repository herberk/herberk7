<?php

use  App\Models\archivos\directorio;

Route::get('file/show','archivosController@show')->name('file/show');

//Route::get('/file/excel','archivosController@export')->name('fileexcel');

//Para manejar los directorios o categorias
Route::get('listacategori',  'archivosController@listacat')->name('listacategori');
Route::get('direct/create','archivosController@create')->name('directcreate');
Route::post('storedirect',['uses' => 'archivosController@store','as' =>'storedirect']);
Route::get('/direct/edit/{id}','archivosController@edit')->name('directedit');
Route::put('direct/update/{id}', ['as' =>  'direct/update', 'uses' => 'archivosController@update']);
Route::get('direct/destroy/{id}', ['as' => 'direct/destroy', 'uses' => 'archivosController@destroy']);


Route::get('files/directorios/{empresa_id}', function ($empresas_id) {
    $directorios = directorio::where('empresas_id', $empresas_id)
        ->select('id as value', 'name as text')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
    array_unshift($directorios, ['value' => '', 'text' => 'Selecione Comuna']);
    return $directorios;
});

//Para manejar archivos
Route::get('fileslista', 'archivosController@index')->name('fileslista');
Route::get('files/create','archivosController@filecreate')->name('filescreate');
Route::post('files/store', 'archivosController@storefile')->name('files.store');
Route::delete('/files/{id}', 'archivosController@destroyfile')->name('files.destroy');
Route::get('/files/{file}/download', 'archivosController@download')->name('files.download');

