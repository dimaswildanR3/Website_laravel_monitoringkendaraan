<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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

Route::get('monitoring_kendaraanpenyetuju', function () {
    return view('monitoring/indexpenyetuju');
});
Route::get('adminhome', function () {
    return view('adminhome');
});
Route::get('editor', function () {
    return view('editor');
});


Route::resource('monitoring_kendaraan', monitoring_kendaraanController::class);
Route::get('monitoring_kendaraan', 'monitoring_kendaraanController@index');
Route::get('monitoring_kendaraan/{id}', 'monitoring_kendaraanController@getById');
Route::delete('monitoring_kendaraan/{id}', 'monitoring_kendaraanController@destroy');

Route::resource('driver', DriverController::class);
Route::get('driver', 'DriverController@index');
Route::get('driver/{driver_id}', 'DriverController@getById');
Route::delete('driver/{driver_id}', 'DriverController@destroy');

Route::resource('monitoring_kendaraanpenyetuju', persetujuanController::class);
Route::get('monitoring_kendaraanpenyetuju', 'persetujuanController@index');
Route::get('monitoring_kendaraanpenyetuju/{id}', 'persetujuanController@getById');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('editor')->middleware('is_admin');
Route::get('editor/home', 'HomeController@editor')->name('admin.home')->middleware('is_admin');
Route::get('export-laravel','ExportLaravelController@export');
Route::get('/monitor', 'MonitorController@index');
Route::get('/monitor/export_excel', 'MonitorController@export_excel');


