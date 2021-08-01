<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userbooks = Book::orderBy('created_at','DESC')->paginate(9);
        return view('layouts.user.homeuser',compact('userbooks'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userbook = Book::find($id);
        return view('layouts.user.detailbook',compact('userbook'));

    }

    
}