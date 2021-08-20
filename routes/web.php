<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\BookBorrowController;
use App\Models\Publisher;
use App\Http\Controllers\ViewAuthorController;
use App\Http\Controllers\ViewCategoryController;
use App\Http\Controllers\ViewPublisherController;
use App\Http\Controllers\SearchController;

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
    Route::get('admin/author/export', [AuthorController::class, 'export'])->name('author.export');
    Route::get('admin/publisher/export', [PublisherController::class, 'export'])->name('publisher.export');
    Route::get('admin/book/export', [BookController::class, 'export'])->name('book.export');
    Route::get('admin/user/export', [UserController::class, 'export'])->name('user.export');
});
Route::middleware(['auth'])->group(function () {
 Route::get('/', 'ViewUserController@index');
 Route::resource('/homepage',ViewUserController::class);
 Route::get('/author/{author}', [ViewAuthorController::class, 'showAuthor']);
 Route::get('/category/{category}', [ViewCategoryController::class, 'showCategory']);
 Route::get('/publisher/{publisher}', [ViewPublisherController::class, 'showPublisher']);
 Route::get('/search',[SearchController::class,'search']);
 Route::get('/add/{book_id}',[BookBorrowController::class,'store'])->name('book_borrow_add.store');
 Route::get('/destroyAll',[BookBorrowController::class,'destroy_all'])->name('book_borrow.destroy_all');
 Route::resources([
  'book_borrow' => 'BookBorrowController',
 ]);
});