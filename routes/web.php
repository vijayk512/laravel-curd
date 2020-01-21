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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/import', 'EmployeeController@import');
    Route::get('/home', 'EmployeeController@getIndex');
    Route::get('/data', 'EmployeeController@getData');
    Route::get('/data', 'EmployeeController@getData');
    Route::get('/create', 'EmployeeController@getCreate');
    Route::post('/create', 'EmployeeController@postCreate');
    Route::get('/edit/{employee}', 'EmployeeController@getEdit');
    Route::post('/edit/{employee}', 'EmployeeController@postEdit');
    Route::get('/delete/{employee}', 'EmployeeController@destroy');
    Route::get('/logout', 'HomeController@getLogout');
});