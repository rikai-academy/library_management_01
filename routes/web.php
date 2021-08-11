<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewAuthorController;
use App\Http\Controllers\ViewCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentUserController;
use App\Http\Controllers\LikeBookController;
use App\Http\Controllers\FlAuthorController;
use App\Http\Controllers\FlBookController;
use Illuminate\Support\Facades\Auth;

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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::middleware(['auth'])->group(function () {
	Route::get('/', 'ViewUserController@index');
	Route::resource('/homepage', ViewUserController::class);
	Route::get('/author/{author}', [ViewAuthorController::class, 'showDetail']);
	Route::get('/category/{category}', [ViewCategoryController::class, 'showCategory']);
	Route::get('/search',[SearchController::class,'search']);
	Route::post('/comment',[CommentUserController::class,'store']);
	Route::post('/save-likedislike',[LikeBookController::class,'save_likedislike']);
	Route::post('/author-fl',[FlAuthorController::class,'save_flunfl']);
	Route::post('/book-fl',[FlBookController::class,'book_flunfl']);
});
Route::get('/rent', function () {
	return view('layouts.user.rental');
});
Route::get('/contact', function () {
	return view('layouts.user.contact');
});
Route::get('/admin', [AdminController::class, 'home'])->name('admin.home');
Auth::routes();
Route::resources([
    'user' => 'Admin\UserController',
]);