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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/incubation', 'IncuHomeController@index')->name('incubation');
Route::resource('incustudent', 'StudentController');
Route::get('/getUpdate','StudentController@getUpdate')->name('getUpdate');
Route::post('/newUpdate','StudentController@newUpdate')->name('newUpdate');
