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
Route::get('detail/{id}', 'HomeController@getNew')->name('new.detail');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/profile', 'HomeController@profile')->name('user.profile');
    Route::post('/update', 'HomeController@updateProfile')->name('user.update');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login');
    Route::get('/register', 'AuthAdmin\LoginController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'AuthAdmin\LoginController@register');
    Route::get('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::post('/logout', 'AuthAdmin\LoginController@logout');

    Route::resource('users', 'UserController')->except(['show', 'create', 'store']);

    Route::resource('comments', 'CommentController')->except(['show', 'edit', 'update', 'create', 'store']);

    Route::resource('votes', 'VoteController')->except(['show', 'edit', 'update', 'create', 'store', 'destroy']);

    Route::resource('news', 'NewController');


    Route::resource('operators', 'AdminController');
});
