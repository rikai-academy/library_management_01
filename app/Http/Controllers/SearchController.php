<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class SearchController extends Controller
{
	public function search(){
	 $bookSearch = Book::Search()->get();
	 return view('layouts.user.search',compact('bookSearch'));
	}
}