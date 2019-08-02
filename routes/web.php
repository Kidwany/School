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

Route::group(['middleware' => 'auth', 'namespace' => 'Dashboard'], function () {

    /* -- Return Home Page -- */
    Route::get('/admin', 'DashboardController@index');

    /* -- Return Classes Page -- */
    Route::resource('/admin/classes', 'ClassesController');

    /* -- Return Grades Page -- */
    Route::resource('/admin/grades', 'GradesController');

    /* -- Return Levels Page -- */
    Route::resource('/admin/levels', 'LevelsController');

    /* -- Return Students Page -- */
    Route::resource('/admin/students', 'StudentsController');
    Route::get('/admin/students/student-grade/{id}', 'StudentsController@studentGrade');
    Route::get('/admin/students/student-class/{id}', 'StudentsController@studentClass');

    /* -- Return Subjects Page -- */
    Route::resource('/admin/subjects', 'SubjectsController');
    Route::get('/admin/subject-grades/{id}', 'SubjectsController@subjectGrades');
    Route::get('/admin/subject-teachers/{id}', 'SubjectsController@subjectTeachers');

    /* -- Return Teachers Page -- */
    Route::resource('/admin/teachers', 'TeachersController');

    /* -- Return Users Page -- */
    Route::resource('/admin/users', 'UsersController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\LoginController@loginView');



