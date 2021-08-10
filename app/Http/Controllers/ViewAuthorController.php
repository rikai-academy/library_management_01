<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\AuthorFollow;
use App\Models\Publisher;
class ViewAuthorController extends Controller
{
    public function showDetail($author){
			$check = null;
			$checkfirst = null;
			$menucategory = Category::all();
			$menuauthor = Author::all();
			$menuPublisher = Publisher::all();
			$Getauthor = Author::with('book')->find($author);
			$bookByAuthor = $Getauthor->Book; 
			$follows = AuthorFollow::SumFollow($author);
			if(AuthorFollow::CheckFollow($author)->exists()) {
				$check=true;
				$checkfirst=false;
			}else if(AuthorFollow::CheckUnFollow($author)->exists()) {
				$check=false;
				$checkfirst=false;
			}
			else{
				$checkfirst=true;
			}
      return view('layouts.user.detailauthor', compact('menucategory','menuauthor','menuPublisher','Getauthor','bookByAuthor','follows','check','checkfirst'));
    }


}