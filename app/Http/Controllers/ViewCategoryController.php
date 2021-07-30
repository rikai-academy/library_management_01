<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
class ViewCategoryController extends Controller
{
  public function showCategory($category){
	 $getCategory = Category::with('book')->find($category);
	 $bookByCategory = $getCategory->Book;
   return view('layouts.user.viewcategory', compact('getCategory','bookByCategory'));
  }
}