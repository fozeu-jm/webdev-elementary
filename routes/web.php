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
    return view('auth.connect');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/accueil', 'dashboardController@index')->name('dash');

Route::resource('schools', 'schoolController');

Route::post('/schools/search', 'schoolController@search')->name('schools.search');

Route::post('/users/search', 'userController@search')->name('users.search');

Route::get('/users/root', 'userController@negaindex')->name('users.nega');

Route::resource('users', 'userController');


Route::resource('academicyear', 'academicController');

Route::post('/levels/search', 'levelController@search')->name('levels.search');

Route::resource('levels', 'levelController');

Route::post('/professors/search', 'professorController@search')->name('professors.search');

Route::resource('professors', 'professorController');

Route::post('/courses/search', 'courseController@search')->name('courses.search');

Route::resource('courses', 'courseController');

Route::post('/students/search', 'studentController@search')->name('students.search');

Route::get('/students/searchform', 'studentController@notes')->name('students.notes');

Route::post('/students/filter', 'studentController@filter')->name('students.filter');

Route::get('/students/{student}/fillnotes', 'studentController@fill')->name('students.fill');

Route::put('/students/notes/{student}', 'studentController@saveNotes')->name('students.enter');

Route::get('/students/attendanceform', 'studentController@attendance')->name('students.attendance');

Route::post('/students/attendancefilter', 'studentController@filterPresence')->name('students.filterPresence');

Route::get('/students/{student}/fillattendance', 'studentController@fillAttendance')->name('students.fillAttendance');

Route::put('/students/abscence/{student}', 'studentController@saveAbscence')->name('students.saveAbscence');

Route::put('/students/printcard/{student}', 'studentController@printReport')->name('students.printReport');

Route::resource('students', 'studentController');

Route::post('/interhsips/search', 'internshipController@search')->name('internships.search');

Route::resource('internships', 'internshipController');

Route::post('/installments/search', 'installmentsController@search')->name('installments.search');

Route::resource('installments', 'installmentsController');

Route::post('/payments/search', 'paymentController@search')->name('payments.search');

Route::resource('payments', 'paymentController');

Route::resource('settings', 'settingsController');

