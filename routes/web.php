<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PublisherController;
use App\Models\Publisher;


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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::prefix('/admin')->group(function () {
 Route::get('/', [AdminController::class, 'home'])->name('admin.home');
 Route::middleware(['checkAdmin'])->group(function () {
 Route::resources([
  'user' => 'Admin\UserController',
  'category' => 'Admin\CategoryController',
  'book' => 'Admin\BookController',
  'author' => 'Admin\AuthorController',
  'publisher' => 'Admin\PublisherController',
 ]);
});
 Route::get('/author/export', [AuthorController::class, 'export'])->name('author.export');
 Route::get('/publisher/export', [PublisherController::class, 'export'])->name('publisher.export');
 Route::get('/book/export', [BookController::class, 'export'])->name('book.export');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::middleware(['auth'])->group(function () {
	Route::get('/', 'ViewUserController@index');
	Route::resource('/homepage',ViewUserController::class);
});