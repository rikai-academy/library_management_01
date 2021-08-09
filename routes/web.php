<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorController;

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


Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/author/export', [AuthorController::class, 'export'])->name('author.export');
Route::resources([
    'user' => 'Admin\UserController',
    'category' => 'Admin\CategoryController',
    'book' => 'Admin\BookController',
    'author' => 'Admin\AuthorController',
    'publisher' => 'Admin\PublisherController',
]);
