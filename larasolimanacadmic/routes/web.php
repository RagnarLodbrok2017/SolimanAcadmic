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

use App\Exports\IncuStudentExport;
use App\Exports\UsersExport;

Route::get('/downloadUsers', function () {
    return Excel::download(new UsersExport, 'users.xlsx');
});
/*Route::get('/downloadStudents', function () {
    return Excel::download(new IncuStudentExport , 'Students.xlsx');
});*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

/*  *********************************************************** Incubation Routes *********************************************************  */
//incubation routes
Route::get('/incubation', 'IncuHomeController@index')->name('incubation');

// Incustudent routes
Route::resource('incustudent', 'StudentController');
Route::get('/getUpdate','StudentController@getUpdate')->name('getUpdate');
Route::post('/newUpdate','StudentController@newUpdate')->name('newUpdate');
//actions in IncuStudents Details
Route::get('/downloadIncuStudents','StudentController@downloadIncuStudents');
Route::get('/changepaymentsgetto0incustudent','StudentController@changepaymentsgetto0incustudent');
Route::get('/changepaymentsgetto1incustudent','StudentController@changepaymentsgetto1incustudent');

/* Incusubject routes  */
Route::resource('incusubject', 'IncusubjectController');
Route::post('/newUpdateSubject','IncusubjectController@newUpdateSubject')->name('newUpdateSubject');

/*                   SuperAdmin Budget  ميزانية السوبر ادمين              */
Route::resource('budget', 'SuperadminbudgetController');
Route::post('/updatebudget','SuperadminbudgetController@newUpdateBudget')->name('newUpdateBudget');

/*           Teacher In incu routes       */
Route::resource('teacher', 'TeacherController');
Route::get('/getUpdateIncuTeacher','TeacherController@getUpdateIncuTeacher')->name('getUpdateIncuTeacher');
Route::post('/newUpdateIncuTeacher','TeacherController@newUpdateIncuTeacher')->name('newUpdateIncuTeacher');
Route::post('/newUpdateIncuTeacher','TeacherController@newUpdateIncuTeacher')->name('newUpdateIncuTeacher');
//actions in IncuTeachers Details
Route::get('/changesalarygetto0','TeacherController@changesalarygetto0');
Route::get('/changesalarygetto1','TeacherController@changesalarygetto1');

/*           all Stuff In Site routes       */
Route::resource('stuff', 'StuffController');
Route::get('/getUpdateStuff','StuffController@getUpdateStuff')->name('getUpdateStuff');
Route::post('/newUpdateStuff','StuffController@newUpdateStuff')->name('newUpdateStuff');
Route::post('/newUpdateStuff','StuffController@newUpdateStuff')->name('newUpdateStuff');
//actions in IncStuff Details
Route::get('/changesalarygetto0stuff','StuffController@changesalarygetto0stuff');
Route::get('/changesalarygetto1stuff','StuffController@changesalarygetto1stuff');

/* Admins Route */
Route::resource('admin', 'UserController');
Route::post('/UpdateAdmin','UserController@UpdateAdmin')->name('UpdateAdmin');

/*  *********************************************************** Center Routes *********************************************************  */
Route::get('/center', 'CenterController@index')->name('incubation');
// Student Routes
Route::get('/students','StudentController@centerIndex')->name('centerIndex');
Route::get('/createStudent','StudentController@createStudent')->name('createStudent');
Route::post('storeStudentCenter','StudentController@storeStudentCenter')->name('storeStudentCenter');
Route::get('/getUpdateStudentCenter','StudentController@getUpdateStudentCenter')->name('getUpdateStudentCenter');
Route::post('/newUpdateStudentCenter','StudentController@newUpdateStudentCenter')->name('newUpdateStudentCenter');
Route::get('/downloadCenterStudents','StudentController@downloadCenterStudents');
Route::get('/changepaymentsgetto0centerstudent','StudentController@changepaymentsgetto0centerstudent');
Route::get('/changepaymentsgetto1centerstudent','StudentController@changepaymentsgetto1centerstudent');


/*           Teacher In center routes       */
Route::get('/indexOfCenterTeachers','TeacherController@indexOfCenterTeachers')->name('indexOfCenterTeachers');
Route::get('/createTeacher','TeacherController@createTeacher')->name('createTeacher');
Route::post('storeTeacherOfCenter','TeacherController@storeTeacherOfCenter')->name('storeTeacherOfCenter');
Route::get('/getUpdateCenterTeacher','TeacherController@getUpdateCenterTeacher')->name('getUpdateCenterTeacher');
Route::post('/newUpdateCenterTeacher','TeacherController@newUpdateCenterTeacher')->name('newUpdateCenterTeacher');
Route::post('/destroyCenterTeacher','TeacherController@destroyCenterTeacher')->name('destroyCenterTeacher');
//actions in Teachers Details
Route::get('/changecentersalarygetto0','TeacherController@changecentersalarygetto0');
Route::get('/changecentersalarygetto1','TeacherController@changecentersalarygetto1');
