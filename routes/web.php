<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', [LoginController::class, 'show'])->name('login.show');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.action');

Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.action');

Route::get('/profile', [HomeController::class, 'show'])->name('profile.show');
Route::post('/profile', [HomeController::class, 'changeProfile'])->name('profile.action');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/profile/blog', [ArticleController::class, 'show'])->name('blog.show');
Route::post('/profile/blog', [ArticleController::class, 'create'])->name('blog.create');

Route::get('/blog', [ArticleController::class, 'showblog'])->name('blogs.show');
Route::post('/blog', [ArticleController::class, 'delete'])->name('blog.delete');

Route::get('/profile/admin', [AdminController::class, 'adminShow'])->name('admin.show');
Route::post('/profile/admin', [AdminController::class, 'Action'])->name('find.Action');
