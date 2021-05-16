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
Route::post("/read_excel","App\Http\Controllers\CsvimportController@store");
Route::get("/read_excel","App\Http\Controllers\CsvimportController@create");
Route::get("/csvdata","App\Http\Controllers\CsvimportController@index");
