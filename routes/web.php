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

Route::get('/', function () {
    return view('index');
});

Route::get('index','SiteController@index')->name('index');
Route::get('/courses-page', function () {
    return view('courses-page');
});

Auth::routes();
Route::resource('profile','ProfileController')->name('index','profile');
Route::resource('editusers','AdminsUsersController')->name('index','editusers');

Route::get('admins','AdminPageController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');
