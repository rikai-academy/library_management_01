<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Publisher;
use App\Models\BookFollow;

class ViewUserController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $userbooks = Book::orderBy('created_at','DESC')->paginate(9);
        $menucategory = Category::all();
				$menuauthor = Author::all();
				$menuPublisher = Publisher::all();
        return view('layouts.user.homeuser',compact('userbooks','menucategory','menuauthor','menuPublisher'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userbook = Book::with('author')->find($id);
				$userbooks = Book::all();
				$menucategory = Category::all();
				$menuauthor = Author::all();
				$menuPublisher = Publisher::all();
				$comment = $userbook->comment;
				$check = null;
				$checkfirst = null;
				$checkFl=null;
				$check1=null;
				$likes = Like::SumLike($id);
				$dislikes = Like::SumDislike($id);
				if(Like::CheckLike($id)->exists()) {
						$check=true;
						$checkfirst=false;
				}else if(Like::CheckDislike($id)->exists()) {
					$check=false;
					$checkfirst=false;
				}
				else{
					$checkfirst=true;
				}
				$follows = BookFollow::SumFollow($id);
			if(BookFollow::CheckFollow($id)->exists()) {
				$checkFl=true;
				$check1=false;
			}else if(BookFollow::CheckUnFollow($id)->exists()) {
				$checkFl=false;
				$check1=false;
			}
			else{
				$check1=true;
			}
        return view('layouts.user.detailbook',compact('userbook','userbooks','menucategory','menuauthor','menuPublisher','comment','likes','dislikes','follows','check','checkfirst','checkFl','check1'));

    }
		
   
}