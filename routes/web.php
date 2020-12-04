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
Route::get('/students/{id}', "StudentController@getStudent");
Route::post('/students/add-new', "StudentController@addStudent");
Route::post('/students/update/{id}', "StudentController@updateStudent");
Route::post('/students/delete/{id}', "StudentController@deleteStudent");

Route::fallback(function () {
    abort(404);
});