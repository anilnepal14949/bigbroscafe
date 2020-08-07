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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::any('/backend/{any?}', 'AdminController@index')->where('any', '.*')->middleware(['auth', 'is_admin']);
Route::get('/{any?}', 'HomeController@frontend')->where('any', '.*');
