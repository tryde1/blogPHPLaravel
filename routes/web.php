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

Route::get('/register', 'RegisterController@show')->name('register.show');
Route::post('/register', 'RegisterController@register')->name('register.action');

Route::get('/login', 'LoginController@show')->name('login.show');
Route::post('/login', 'LoginController@login')->name('login.action');

Route::get('/profile', 'HomeController@show')->name('profile.show');
Route::post('/profile', 'HomeController@changeProfile')->name('profile.action');

Route::get('/logout', 'LogOutController@logout')->name('logout');

Route::get('/profile/blog', 'BlogController@show')->name('blog.show');
Route::post('/profile/blog', 'BlogController@create')->name('blog.create');

Route::get('/blog', 'BlogController@showblog')->name('blogs.show');
