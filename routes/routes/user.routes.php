<?php

// Users
Route::get('/usuarios', 'UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');

Route::post('/usuarios', 'UserController@store');

Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::get('/usuarios/papelera', 'UserController@trashed')->name('users.trashed');

Route::patch('/usuarios/{user}/papelera', 'UserController@trash')->name('users.trash');

Route::delete('/usuarios/{id}', 'UserController@destroy')->name('users.destroy');

Route::get('users/restore/{id}', ['as' =>  'users/restore', 'uses' => 'UserController@restore']);

Route::get('Exports/{id}/{pd}',['as' => 'Exports', 'uses'=> 'UserController@Exports']);

// Profile
Route::get('/editar-perfil/', 'ProfileController@edit');
Route::put('/editar-perfil/', 'ProfileController@update');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');


// Professions
Route::get('/profesiones/',['uses' => 'ProfessionController@index','as' => 'profesiones']);
Route::post('newprofesion',['uses' => 'ProfessionController@store','as' => 'newprofesion']);
Route::delete('/profesiones/{profession}', 'ProfessionController@destroy');

// Skills
Route::get('/habilidades/', 'SkillController@index');
