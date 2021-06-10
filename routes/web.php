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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::resource('user','UserController');
Route::get('userTable','UserController@DataTables')->name('user.datatable');
Route::resource('inventory','InventoryController');
Route::get('inventoryTable','InventoryController@DataTables')->name('inventory.datatable');
