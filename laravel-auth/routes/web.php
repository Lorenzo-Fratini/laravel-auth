<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')
    -> name('logout');

Route::get('/', 'GuestController@index')
    -> name('index');

Route::get('/pilot/{id}', 'GuestController@show')
    -> name('show');

Route::get('/create/car', 'LoggedController@create')
    -> name('create');
Route::post('/store/car', 'LoggedController@store')
    -> name('store');

Route::get('/edit/car/{id}', 'LoggedController@edit')
    -> name('edit');
Route::post('/update/car/{id}', 'LoggedController@update')
    -> name('update');

Route::get('/delete{id}', 'LoggedController@delete')
    -> name('delete');
