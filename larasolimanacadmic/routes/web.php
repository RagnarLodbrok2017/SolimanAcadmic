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
//incubation routes

Route::get('/incubation', 'IncuHomeController@index')->name('incubation');

// Incustudent routes
Route::resource('incustudent', 'StudentController');
Route::get('/getUpdate','StudentController@getUpdate')->name('getUpdate');
Route::post('/newUpdate','StudentController@newUpdate')->name('newUpdate');

/* Incusubject routes  */
Route::resource('incusubject', 'IncusubjectController');
Route::post('/newUpdateSubject','IncusubjectController@newUpdateSubject')->name('newUpdateSubject');

// SuperAdmin Budget  ميزانية السوبر ادمين
Route::resource('budget', 'SuperadminbudgetController');
Route::post('/updatebudget','SuperadminbudgetController@newUpdateBudget')->name('newUpdateBudget');

// Teacher In incu routes
Route::resource('teacher', 'TeacherController');
