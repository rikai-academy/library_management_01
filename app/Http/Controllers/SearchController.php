<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(){
			$search_text = $_GET['query'];
			$bookSearch = Book::where('name','LIKE','%'.$search_text.'%')->get();
			return view('layouts.user.search',compact('bookSearch'));
		}
}