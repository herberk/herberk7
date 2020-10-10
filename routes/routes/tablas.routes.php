<?php
use App\Models\varias\help;
use App\Models\Tablas\giros;
use App\Models\Tablas\girosbs;
use App\Models\Tablas\comunas;
use Illuminate\Support\Arr;
//pantalla de varios blade para probar los select de regiones comunas y de categorias item

Route::get('varios',function (){
   return view('tablas.partials.varios',compact('Ciudades','Regiones', 'Comunas'));
});

//Giros o actividades de empresas
Route::get('giros',['as' => 'giros',
    'uses' => 'girosController@giros'
]);
Route::get('girosxls', 'girosController@Exports')->name('girosxls');;

Route::get('girosb/{giroa_id}', function ($giroa_id) {
    $girosb = Girosbs::where('girosas_id', $giroa_id)
        ->select('id as value', 'name as text','blanco as text2')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
    array_unshift($girosb, ['value' => '', 'text2'=>"", 'text' => 'Selecione Sub Rubros']);
    return $girosb;
});
Route::get('detallegiro/{girob_id}', function ($girob_id) {
    $giros = Giros::where('girosbs_id', $girob_id)
        ->select('id as value', 'name as text', 'codigo as text2')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
    array_unshift($giros, ['value' => '', 'text2'=>"", 'text' => 'Selecione Giro']);
    return $giros;
});


Route::get('autocomplete/giros',function(){
    $term = Request::get('term');
    return Giros::findByNameOrCodigo($term);
});
Route::get('autocomplete/codigogiros',function(){
    $term = Request::get('term');
    return Giros::findByCodeOrName($term);
});

//Categorias  Items
Route::get('categorias','categoriasController@index')->name('categorias');
Route::get('newcategorias','categoriasController@create')->name('newcategorias');
Route::post('storecategoria', 'categoriasController@store')->name('storecategoria');
Route::get('eliminarcat/{id}','categoriasController@elimina')->name('eliminarcat');
Route::delete('categoriadelete/{id}','categoriasController@destroy')->name('categoriadelete');
Route::get('editarcat/{id}','categoriasController@edit')->name('editarcat');
Route::put('updatecat/{id}','categoriasController@update')->name('updatecat');

Route::get('newitem/{id}','categoriasController@createitem')->name('newitem');
Route::post('storeitem', 'categoriasController@storeitem')->name('storeitem');
Route::get('editaritem/{id}/{lacate}','categoriasController@edititem')->name('editaritem');
Route::put('updateitem/{id}','categoriasController@updateitem')->name('updateitem');
Route::get('eliminaritem/{id}/{lacate}','categoriasController@eliminaitem')->name('eliminaritem');
Route::delete('itemdelete/{id}','categoriasController@destroyitem')->name('itemdelete');

/*
Route::get('atributo/Exports', 'TipoatrController@Exports')->name('atributo/Exports');
*/

//Locaciones Regiones Comunas

Route::get('locaciones','locacionesController@locacionesindex')->name('locaciones');
Route::get('ciudad/create','locacionesController@create')->name('ciudadescreate');
Route::post('ciudadcreate','locacionesController@store')->name('ciudadcreate');
Route::get('eliminar/{id}','locacionesController@elimina')->name('eliminar');
Route::delete('ciudaddelete/{id}','locacionesController@destroy')->name('ciudaddelete');
Route::get('editar/{id}','locacionesController@edit')->name('editar');
Route::put('update/{id}','locacionesController@update')->name('update');
Route::get('comunaspor/{region_id}', 'locacionesController@comunaporregion')->name('comunaspor');

Route::get('comunas/{region_id}', function ($regiones_id) {
    $comunas = Comunas::where('regiones_id', $regiones_id)
        ->select('id as value', 'name as text')
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();
    array_unshift($comunas, ['value' => '', 'text' => 'Selecione Comuna']);
    return $comunas;
});


// Valores estadisticos o de actualizacion
Route::get('listaunidad','UnidadvalorController@index')->name('listaunidad');
Route::get('insertano','UnidadvalorController@create')->name('insertano');
Route::post('unidad/update','UnidadvalorController@updatenew');
Route::post('/import', 'UnidadvalorController@import')->name('import');


Route::get('buscahelp/{id}', function ($id){
    $help = help::where('id', $id)->select('notes')
        ->get();
  return $valor = Arr::pluck($help,'notes');

});
