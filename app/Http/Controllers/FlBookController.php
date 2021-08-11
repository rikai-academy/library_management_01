<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookFollow;
class FlBookController extends Controller
{
    function book_flunfl(Request $request){
			$follow = new BookFollow;
			$input['choiceFl'] = $request->input('choiceFl');
			$requestBook = $request->input('book_id');
			$requestUser = $request->User()->id;
			if(BookFollow::GetFollow($requestBook,$requestUser)->exists()){
				$updateUnFollow = BookFollow::UpUnFollow($requestBook,$requestUser);
			}
			else if(BookFollow::GetUnFollow($requestBook,$requestUser)->exists()){
				$updateFollow = BookFollow::UpFollow($requestBook,$requestUser);
			}
			else{
				$follow->user_id = $requestUser;
				$follow->book_id = $requestBook;
				if($input['choiceFl']=='Follow'){
					$follow->follow = 1;
				}else if($input['choiceFl']=='UnFollow'){
					$follow->follow = 0;
				}
				$follow->save();
			}
			return redirect()->back();
		}
}