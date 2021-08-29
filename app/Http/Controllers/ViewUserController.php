<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Comment;
use Illuminate\Support\Facades\URL;

class ViewUserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $userBooks = Book::orderBy('created_at', 'DESC')->paginate(9);
    return view('layouts.user.homeuser', compact('userBooks'));
  }

  public function show($id)
  {

    $url_page = URL::current();

    $userBook = Book::with('author')->find($id);
    $books = Book::orderBy('created_at', 'DESC')->take(7)->get();

    $open_graph_face_book = [
      'url_page' =>$url_page,
      'title_book' => $userBook->desc,
      'image_book'=> public_path('uploads/'.$userBook->image),
      'name_book'=>$userBook->name,
    ];

    $comment = Comment::latest()->get();
    return view('layouts.user.detailbook', compact('userBook', 'books', 'comment','open_graph_face_book'));
  }
}
