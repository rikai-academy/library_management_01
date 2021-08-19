<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
class ViewAuthorController extends Controller
{
  public function showAuthor($author){
	 $getAuthor = Author::with('book')->find($author);
	 $bookByAuthor = $getAuthor->Book; 
   return view('layouts.user.detailauthor', compact('getAuthor','bookByAuthor'));
  }
}