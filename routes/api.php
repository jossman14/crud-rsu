<?php

use App\Http\Controllers\DatasController;
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

Route::get("/data", "DatasController@get");
Route::get("/data/{id}", "DatasController@getById");
Route::post("/data", "DatasController@post");
Route::put("/data/{id}", "DatasController@put");
Route::delete("/data/{id}", "DatasController@delete");

//dokter
Route::get("/dokter", "DoktersController@get");
Route::get("/dokter/{id}", "DoktersController@getById");
Route::post("/dokter", "DoktersController@post");
Route::put("/dokter/{id}", "DoktersController@put");
Route::delete("/dokter/{id}", "DoktersController@delete");

//perawat
Route::get("/perawat", "PerawatsController@get");
Route::get("/perawat/{id}", "PerawatsController@getById");
Route::post("/perawat", "PerawatsController@post");
Route::put("/perawat/{id}", "PerawatsController@put");
Route::delete("/perawat/{id}", "PerawatsController@delete");

//ruang
Route::get("/ruang", "RuangsController@get");
Route::get("/ruang/{id}", "RuangsController@getById");
Route::post("/ruang", "RuangsController@post");
Route::put("/ruang/{id}", "RuangsController@put");
Route::delete("/ruang/{id}", "RuangsController@delete");

//inap
Route::get("/inap", "InapsController@get");
Route::get("/inap/{id}", "InapsController@getById");
Route::post("/inap", "InapsController@post");
Route::put("/inap/{id}", "InapsController@put");
Route::delete("/inap/{id}", "InapsController@delete");

//bayar
Route::get("/bayar", "BayarsController@get");
Route::get("/bayar/{id}", "BayarsController@getById");
Route::post("/bayar", "BayarsController@post");
Route::put("/bayar/{id}", "BayarsController@put");
Route::delete("/bayar/{id}", "BayarsController@delete");

//shift
Route::get("/shift", "ShiftsController@get");
Route::get("/shift/{id}", "ShiftsController@getById");
Route::post("/shift", "ShiftsController@post");
Route::put("/shift/{id}", "ShiftsController@put");
Route::delete("/shift/{id}", "ShiftsController@delete");
