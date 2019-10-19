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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/', 'CardController@index')->name('home');

/*Route::get('/admin', function () {
    return view('layouts.dashboard');
})->name('admin');*/

Route::get('/', ['middleware' => 'auth', 'uses' => 'CardController@index'])->name('home');
Route::resource('card','CardController');
Route::resource('position','PositionController'); // справочник дожностей
Route::resource('mo','MoController'); // справочник МО
Route::resource('user','UserController'); // справочник пользователей
