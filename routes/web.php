<?php
use Illuminate\Support\Facades\Auth;
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
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('news/{id}', 'HomeController@getNew')->name('new.detail');

Route::prefix('user')->group(function () {
    Route::get('/profile/{id}', 'HomeController@profile');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
});
