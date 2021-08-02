<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
class ViewAuthorController extends Controller
{
    public function showDetail($author){
			$menucategory = Category::all();
			$menuauthor = Author::all();
				$Getauthor = Author::with('book')->find($author);
				$bookByAuthor = $Getauthor->Book; 
        return view('layouts.user.detailauthor', compact('menucategory','menuauthor','Getauthor','bookByAuthor'));
    }


}