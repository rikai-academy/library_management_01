<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Services\SendMailService;

class CommentUserController extends Controller
{

  public function __construct()
  {
      $this->sendMail = new SendMailService;
  }

  public function store(Request $request)
  {
    $input['user_id'] = $request->User()->id;
    $input['book_id'] = $request->input('book_id');
    $input['desc_comment'] = $request->input('desc_comment');
    Comment::create($input);

    $data_user = Comment::distinct()->where('book_id', $input['book_id'])->get(['user_id']);
    $this->sendMail->sendMailComment($data_user,$input['book_id']);

    return redirect()->back();
  }
}
