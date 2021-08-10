<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\AuthorFollow;
class FlAuthorController extends Controller
{
    function save_flunfl(Request $request){
			$follow = new AuthorFollow;
			$input['choice'] = $request->input('choice');
			$requestAuthor = $request->input('author_id');
			$requestUser = $request->User()->id;

			if(AuthorFollow::GetFollow($requestAuthor,$requestUser)->exists()){
				$updateUnFollow = AuthorFollow::UpUnFollow($requestAuthor,$requestUser);
			}
			else if(AuthorFollow::GetUnFollow($requestAuthor,$requestUser)->exists()){
				$updateFollow = AuthorFollow::UpFollow($requestAuthor,$requestUser);
			}
			else{
				$follow->user_id = $requestUser;
				$follow->author_id = $requestAuthor;
				if($input['choice']=='Follow'){
					$follow->follow = 1;
				}else if($input['choice']=='UnFollow'){
					$follow->follow = 0;
				}
				$follow->save();
			}
			return redirect()->back();
		}
}