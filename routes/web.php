<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewUserController;
use App\Http\Controllers\ViewAuthorController;
use App\Http\Controllers\ViewCategoryController;
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
    return view('welcome');
});


Route::resource('homepage', ViewUserController::class);
Route::get('/author/{author}', [ViewAuthorController::class, 'showDetail']);
Route::get('/category/{category}', [ViewCategoryController::class, 'showCategory']);