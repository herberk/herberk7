<?php

use Illuminate\Support\Facades\Route;

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

Route::fallback(function(){
    return response()->view('errors.404', [], 404);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/back', function () {
    return redirect()->back();
});

//Auth::routes(['register'=>false]);
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas para Seleccionar accesos directos
Route::get('/accesdir','HomeController@showacces')->name('accesdir');
Route::get('/selectdir','HomeController@selectacces')->name('selectdir');
Route::put('/updatedir','HomeController@Update')->name('updatedir');

//Rutas para mensajes de contacto
Route::get('contact-us',array('as'=>'getcontact','uses'=>'ContactoController@getContact'));                    //muestra la ventana de contacto
Route::post('contact-us',array('as'=>'postcontact','uses'=>'ContactoController@postContact'));
Route::get('ver-msge',array('as'=>'vermensage','uses'=>'ContactoController@vermensage'))->name('ver-msge');
Route::get('messages', 'varios\MessageController@fetch');
Route::post('messages', 'varios\MessageController@sentMessage');
Route::get('/chatear', 'varios\MessageController@index')->name('chatear');

Route::group(['middleware' => 'auth'], function () {
//Rutas para settings
    Route::get('/config', 'SettingController@index')->name('config');
    Route::post('/settings', 'SettingController@store')->name('settings.store');
    Route::get('/settings', 'SettingController@show')->name('settings');
    Route::get('/cacheclear', 'SettingController@cacheclear')->name('cacheclear' );
    Route::get('/exportset', 'SettingController@exportset')->name('exportset');
//Ruta para registro actividades
    Route::get('/activiti', 'SettingController@activity')->name('activiti');
    Route::get('/exportact', 'SettingController@exportact')->name('exportact');
//Ruta para seleccionar empresa y año
    Route::get('select/{id}/{vie}', 'HomeController@selectstore')->name('select');
    Route::post('selectano', 'HomeController@storeano')->name('selectano');

});



Route::group([ 'namespace' => 'Auth'],function () {
    require __DIR__ . '/routes/auth.routes.php';
});
Route::group([ 'namespace' => 'User'], function () {
    require __DIR__ . '/routes/user.routes.php';
});
Route::group([ 'namespace' => 'Empresas'], function () {
    require __DIR__ . '/routes/empresas.routes.php';
});
Route::group([ 'namespace' => 'Tablas'], function () {
    require __DIR__ . '/routes/tablas.routes.php';
});
Route::group([ 'namespace' => 'Empresas'], function () {
    require __DIR__ . '/routes/juradas.routes.php';
});
Route::group([ 'namespace' => 'Empresas'], function () {
    require __DIR__ . '/routes/archivos.routes.php';
});
Route::group([ 'namespace' => 'Empresas'], function () {
    require __DIR__ . '/routes/capital.routes.php';
});
Route::group([ 'namespace' => 'Estadisticas'], function () {
    require __DIR__ . '/routes/estadisticas.routes.php';
});
