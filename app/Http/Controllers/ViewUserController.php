<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Like;
use DB;
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
        return view('layouts.user.homeuser',compact('userbooks','menucategory','menuauthor'));
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
				$check = null;
				$checkfirst = null;
        $menucategory = Category::all();
				$menuauthor = Author::all();
				$comment = $userbook->comment;
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
        return view('layouts.user.detailbook',compact('userbook','userbooks','menucategory','menuauthor','comment','likes','dislikes','check','checkfirst'));

    }
		
   
}