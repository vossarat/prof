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

Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->prefix('app')->group(function () {
	Route::get('/', 'CardController@index')->name('app');
    Route::resource('card','CardController');
    Route::resource('biot','BiotController');
    Route::resource('treasury','TreasuryController');
	Route::resource('position','PositionController'); // справочник дожностей
	Route::resource('mo','MoController'); // справочник МО
	Route::resource('user','UserController'); // справочник пользователей
});

Route::group(['middleware'=>'auth'],
function()
{
    Route::prefix('reports')->group(
        function ()
        {
            Route::any('/count_members', 'Reports\CountMembersController@index')->name('reportCountMembers'); //Кол-во введенных сотрудников
            Route::any('/count_members/pdf', 'Reports\CountMembersController@toPDF')->name('reportCountMembersToPDF'); //Кол-во введенных сотрудников в PDF
            Route::any('/count_sex_age', 'Reports\CountSexAgeController@index')->name('reportCountSexAge'); //Половозрастная структура
            Route::any('/count_sex_age_child', 'Reports\CountSexAgeChildController@index')->name('reportCountSexAgeChild'); //Половозрастная структура детей
            Route::any('/count_sex_proffesion', 'Reports\CountSexProfessionController@index')->name('reportCountSexProfession'); //Профессия-пол 
        });
});

/*Route::fallback(function() {
    return 'Хм… Нет такой страницы';
});*/