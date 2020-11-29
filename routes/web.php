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


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('roles', 'RoleController');
    // Route::resource('users', 'UserController');
    // Route::resource('products', 'ProductController');
    // Route::get('view-data', 'AuthorizationController@viewData');
    // Route::get('create-data', 'AuthorizationController@createData');
    // Route::get('edit-data', 'AuthorizationController@editData');
    // Route::get('update-data', 'AuthorizationController@updateData');
    // Route::get('delete-data', 'AuthorizationController@deleteData');
    Route::get("/", "PagesController@index");
    Route::resource('pasien', 'PasiensController');
    Route::resource('dokter', 'DoktersController');
    Route::resource('perawat', 'PerawatsController');
    Route::resource('ruang', 'RuangsController');
    Route::resource('inap', 'InapsController');
    Route::resource('bayar', 'BayarsController');
    Route::resource('shift', 'ShiftsController');
    Route::resource('spesialisasi', 'PenyakitsController');
    Route::resource('poli', 'PolisController');
});

// Route::get('admin-page', function () {
//     return 'Halaman untuk Admin';
// })->middleware('role:admin')->name('admin.page');

// Route::get('user-page', function () {
//     return 'Halaman untuk User';
// })->middleware('role:user')->name('user.page');


// Route::get('/home', 'HomeController@index')->name('home');
