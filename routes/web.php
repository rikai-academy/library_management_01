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
Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'author' => 'AuthorController',
    'authorFollow' => 'AuthorFollowController',
    'book' => 'BookController',
    'bookFollow' => 'BookFollowController',
    'borrowed' => 'BorrowedBookController',
    'category' => 'CategoryController',
    'comment' => 'CommentController',
    'like' => 'LikeController',
    'publisher' => 'PublisherController',
    'rate' => 'RateController',
    'role' => 'RoleController',
    'star' => 'StarController',
]);
Route::get('/homepage', function () {
    return view('layouts.user.homeuser');
});
Route::get('/detailbook', function () {
    return view('layouts.user.detailbook');
});
Route::get('/detailauthor', function () {
    return view('layouts.user.detailauthor');
});
Route::get('/rental', function () {
    return view('layouts.user.rental');
});
Route::get('/contact', function () {
    return view('layouts.user.contact');
});
Route::get('/profile', function () {
    return view('layouts.user.profile');
});