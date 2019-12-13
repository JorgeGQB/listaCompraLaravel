<?php

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

Route::get('/', 'HomeController@getHome');

/* Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return "Logout Usuario";
}); */

/* Route::group(['middleware' => 'auth'], function() {
    Route::get('/productos/{categoria?}', 'ProductoController@getIndex')->where('categoria', '[a-zA-Z ]+');

    Route::get('/productos/show/{id}', 'ProductoController@getShow')->where('id', '[0-9]+');

    Route::get('/productos/create', 'ProductoController@getCreate');
    Route::post('/productos/create', 'ProductoController@postCreate');

    Route::get('/productos/edit/{id}', 'ProductoController@getEdit')->where('id', '[0-9]+');
    Route::put('productos/edit', 'ProductoController@putEdit');

    Route::put('/productos/comprar/{id}', 'ProductoController@putComprar')->where('id', '[0-9]+');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('productos', 'ProductoController2')->middleware('auth');
Route::get('/categorias/{categoria?}', 'ProductoController2@categorias')->where('categoria', '[a-zA-Z ]+')->middleware('auth');
Route::put('/productos/comprar/{producto}', 'ProductoController2@putComprar')->middleware('auth');
