<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Book;
use DB;
class LikeBookController extends Controller
{
	function save_likedislike(Request $request){
		$like = new Like;
		$input['choice'] = $request->input('choice');
		$rB= $request->input('book_id');
		$rU=$request->User()->id;
		
		if (Like::GetLike($rB,$rU)->exists())
		{
				$updatedislike=Like::UpDislike($rB,$rU);
		
		}
		else if(Like::GetDislike($rB,$rU)->exists())
		{
				$updatelike=Like::UpLike($rB,$rU);
		}
		else{
				$like->user_id = $rU;
				$like->book_id = $rB;
				if($input['choice']=='Like'){
					$like->like = 1;
				}else if($input['choice']=='disLike'){
					$like->dislike = 1;
			}
			$like->save();
		}
		return redirect()->back();

	}
}