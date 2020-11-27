<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student', 'StudentController@studentRequestHandler');
Route::get('/student/{id}', 'StudentController@studentRequestHandler');
Route::put('/student/{id}', 'StudentController@studentRequestHandler');
Route::delete('/student/{id}', 'StudentController@studentRequestHandler');
Route::fallback(function () {
    abort(404);
});

