<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\Controller;
class CommentUserController extends Controller
{
    
  public function store(Request $request)
  {
    
    $input['user_id'] = $request->User()->id;
    $input['book_id'] = $request->input('book_id');
    $input['desc_comment'] = $request->input('desc_comment');

    Comment::create($input);

    return redirect()->back();
  }

}