<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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
// Route::get('/schedule', 'MainController@schedule');
Route::get('/teachers', [App\Http\Controllers\AdminController::class, 'teacher'])->name('admin-teacher');
Route::get('/add-teacher', [App\Http\Controllers\AdminController::class, 'addTeacher'])->name('add-teacher');
Route::post('/add-teacher', [App\Http\Controllers\AdminController::class, 'addTeacherPost'])->name('add-teacher-post');

Route::delete('/destroy-teacher/{id}', [App\Http\Controllers\AdminController::class, 'destroyTeacher'])->name('teacher-destroy');
Route::patch('/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update-teacher');
Route::get('/edit-teacher/{id}', [App\Http\Controllers\AdminController::class, 'editTeacher'])->name('edit-teacher');

Route::get('/subjects', 'SubjectsController@index')->name('subject');
Route::get('/add-subject', 'SubjectsController@addSubject')->name('add-subject');
Route::post('/add-subject', 'SubjectsController@addSubjectPost')->name('add-subject-post');

Route::delete('/destroy-subject/{id}','SubjectsController@destroy')->name('subject-destroy');
Route::patch('/update-subject/{id}', 'SubjectsController@update')->name('update-subject');
Route::get('/edit-subject/{id}','SubjectsController@edit')->name('edit-subject');


Route::get('/groups', 'GroupsController@index')->name('group');
Route::get('/add-group', 'GroupsController@addGroup')->name('add-group');
Route::post('/add-group', 'GroupsController@create')->name('add-group-post');

Route::delete('/destroy-group/{id}','GroupsController@destroy')->name('group-destroy');
Route::patch('/update-group/{id}', 'GroupsController@update')->name('update-group');
Route::get('/edit-group/{id}','GroupsController@edit')->name('edit-group');


Route::get('/rooms', 'RoomsController@index')->name('room');
Route::get('/add-room', 'RoomsController@addRoom')->name('add-room');
Route::post('/add-room', 'RoomsController@create')->name('add-room-post');

Route::delete('/destroy-room/{id}','RoomsController@destroy')->name('room-destroy');
Route::patch('/update-room/{id}', 'RoomsController@update')->name('update-room');
Route::get('/edit-room/{id}','RoomsController@edit')->name('edit-room');

Route::get('/schedule', 'SchedulesController@index')->name('schedule');
Route::post('/schedule', 'SchedulesController@search')->name('search');
Route::get('/add-schedule', 'SchedulesController@addSchedule')->name('add-schedule');
Route::post('/add-schedule', 'SchedulesController@create')->name('add-schedule-post');

Route::delete('/destroy-schedule/{id}','SchedulesController@destroy')->name('schedule-destroy');
Route::patch('/update-schedule/{id}', 'SchedulesController@update')->name('update-schedule');
Route::get('/edit-schedule/{id}','SchedulesController@edit')->name('edit-schedule');

Route::get('/out-schedule', 'SchedulesController@outSchedule')->name('out-schedule');
Route::post('/out-schedule', 'SchedulesController@outSearch')->name('out-search');
Route::post('/fetch', 'ColumnSearchingController@fetch')->name('dynamicdependent.fetch'); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
