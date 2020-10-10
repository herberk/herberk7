<?php
use App\Models\Tablas\unidadvalor;
use Illuminate\Support\Arr;

Route::get('estadistica', 'RecuentoController@index') ->name('estadistica.index');
Route::post('estadisticastore', 'RecuentoController@store')->name('estadisticastore');
Route::get('estadisticaedit/{id}','RecuentoController@edit')->name('estadisticaedit');
Route::put('estadisticaupdate/{id}', ['as' =>  'estadisticaupdate', 'uses' => 'RecuentoController@update']);


Route::get('buscautm/{mes}', function ($mes){
    $utm = unidadvalor::where('anomes', $mes)->select('utm')
     ->get();
    $valor = Arr::pluck($utm,'utm');
    return $valor;
});

Route::get('estadistica/papelera', 'RecuentoController@trashed')->name('estadistica.trashed');
Route::get('estadistica/trash/{id}', ['as' => 'estadistica/trash', 'uses' => 'RecuentoController@trash']);
Route::get('estadistica/restore/{id}', ['as' => 'estadistica/restore', 'uses' => 'RecuentoController@restore']);
Route::get('estadistica/excel','RecuentoController@export')->name('estadisticaexcel');
Route::delete('estadistica/{id}', 'RecuentoController@destroy')->name('estadistica.destroy');
