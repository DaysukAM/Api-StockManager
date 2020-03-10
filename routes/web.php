<?php

use Illuminate\Support\Facades\Route;

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
Route::get('materials','MaterialController@list');

Route::get('materials/rentlist','MaterialController@listrent');

Route::post('materials/rent/{id}','RentController@rent');

Route::post('materials/create','MaterialController@create');

Route::delete('materials/delete/{id}','MaterialController@delete');
