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


Route::get('/grades-resource/{id}', 'Dashboard\GradesController@all_grade_resource');
Route::delete('/grades-resource/{id}', 'Dashboard\GradesController@delete_grade_resource');
Route::post('/grades-resource', 'Dashboard\GradesController@store_grade_resource');
