<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BorrowBookController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Auth\LoginFBController;
use App\Http\Controllers\BookBorrowController;
use App\Models\Publisher;
use App\Http\Controllers\ViewAuthorController;
use App\Http\Controllers\ViewCategoryController;
use App\Http\Controllers\ViewPublisherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentUserController;


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
    Route::resource('/homepage', 'ViewUserController')->only(['index', 'show']);
    Route::get('/author/{author}', [ViewAuthorController::class, 'showAuthor']);
    Route::get('/category/{category}', [ViewCategoryController::class, 'showCategory']);
    Route::get('/publisher/{publisher}', [ViewPublisherController::class, 'showPublisher']);
    Route::get('/search', [SearchController::class, 'search']);
    Route::post('/comment', [CommentUserController::class, 'store']);
    Route::get('/add/{book_id}', [BookBorrowController::class, 'store'])->name('book_borrow_add.store');
    Route::get('/destroyAll', [BookBorrowController::class, 'destroy_all'])->name('book_borrow.destroy_all');
    Route::resources([
        'book_borrow' => 'BookBorrowController',
    ]);
    Route::get('/contact', function () {
        return view('layouts.user.contact');
    });
});

Auth::routes();
Route::get('/auth/redirect/{provider}', [LoginFBController::class, 'redirect'])->name('loginFB.redirect');
Route::get('/callback/{provider}', [LoginFBController::class, 'callback'])->name('loginFB.callback');
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
    Route::middleware(['checkAdmin'])->group(function () {
        Route::resources([
            'user' => 'Admin\UserController',
            'category' => 'Admin\CategoryController',
            'book' => 'Admin\BookController',
            'author' => 'Admin\AuthorController',
            'publisher' => 'Admin\PublisherController',
            'borrow' => 'Admin\BorrowBookController',
        ]);
        Route::get('admin/author/export', [AuthorController::class, 'export'])->name('author.export');
        Route::get('admin/publisher/export', [PublisherController::class, 'export'])->name('publisher.export');
        Route::get('admin/book/export', [BookController::class, 'export'])->name('book.export');
        Route::get('admin/user/export', [UserController::class, 'export'])->name('user.export');
        Route::get('admin/borrow/price', [BorrowBookController::class, 'findPrice'])->name('borrow.price');
        Route::get('admin/borrow/{status}', [BorrowBookController::class, 'index'])->name('borrow.index');
        Route::get('admin/borrow/waiting/{user_id}', [BorrowBookController::class, 'waiting_book'])->name('borrow.waiting');
        Route::get('admin/borrow/approve/{user_id}', [BorrowBookController::class, 'approve_borrow_book'])->name('borrow.approve');
        Route::get('admin/borrow/detail/{user_id}', [BorrowBookController::class, 'detail_borrow_book'])->name('borrow.detail');
        Route::get('admin/borrow/approve_book/{borrow}', [BorrowBookController::class, 'approve'])->name('borrow.approve_book');
        Route::get('admin/borrow/miss_book/{c}', [BorrowBookController::class, 'miss_book'])->name('borrow.miss_book');
        Route::get('admin/borrow/return_book/{borrow}', [BorrowBookController::class, 'return_book'])->name('borrow.return_book');
        Route::get('admin/borrow/return_all/{user_id}', [BorrowBookController::class, 'return_book_all'])->name('borrow.return_all');
        Route::get('admin/borrow/detail_return/{user_id}', [BorrowBookController::class, 'detail_return'])->name('borrow.detail_return');
        Route::get('admin/borrow/accept/{user_id}', [BorrowBookController::class, 'accept_book'])->name('borrow.accept_book');
        Route::get('admin/borrow/destroy/{borrow}', [BorrowBookController::class, 'destroy_borrow'])->name('borrow.destroy_borrow');
        Route::get('admin/borrow/refuse_all/{user_id}', [BorrowBookController::class, 'refuse_all'])->name('borrow.refuse_all');
        Route::get('admin/borrow/accept_book_all/{user_id}', [BorrowBookController::class, 'accept_book_all'])->name('borrow.accept_book_all');
        Route::get('admin/borrow/reject_all/{user_id}', [BorrowBookController::class, 'reject_all'])->name('borrow.reject_all');
    });
});

