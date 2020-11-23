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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", "PagesController@index");
Route::resource('pasien', 'PasiensController');
Route::resource('dokter', 'DoktersController');
Route::resource('perawat', 'PerawatsController');
Route::resource('ruang', 'RuangsController');
Route::resource('inap', 'InapsController');
Route::resource('bayar', 'BayarsController');
