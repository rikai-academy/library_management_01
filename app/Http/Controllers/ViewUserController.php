<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Comment;
class ViewUserController extends Controller
{
 public function __construct()
  {
   $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index()
  {
   $userBooks = Book::orderBy('created_at','DESC')->paginate(9);
   return view('layouts.user.homeuser',compact('userBooks'));
  }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function show($id)
  {
   $userBook = Book::with('author')->find($id);
	 $books = Book::orderBy('created_at','DESC')->take(7)->get();
	 $comment = Comment::latest()->get();
   return view('layouts.user.detailbook',compact('userBook','books','comment'));
  }
}