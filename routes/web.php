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

Auth::routes();

Route::get('/', function () {
    return view('index');
});


Route::get('/admin', 'HomeController@index')->name('home');
Route::post('/king/save', 'HomeController@king_save')->name('king.save');
Route::get('/king/edit/{id}', 'HomeController@king_edit')->name('king.edit');
Route::post('/king/update', 'HomeController@king_update')->name('king.update');
Route::get('/king/delete/{id}', 'HomeController@king_delete')->name('king.delete');

Route::post('/setting/update', 'HomeController@setting_update')->name('setting.update');