<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $guarded = [];
    use HasFactory;
		protected $fillable = ['user_id','like','dislike','book_id'];

    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id");
		}
		public function Book()
    {
        return $this->belongsTo("App\Models\Book", "book_id");
		}
		public function scopeGetLike($query,$rB,$rU){
			return $query->where('book_id', '=', $rB)
			->where('user_id', '=',$rU)
			->where('like','=',1);
		}
		public function scopeGetDislike($query,$rB,$rU){
			return $query->where('book_id', '=', $rB)
			->where('user_id', '=',$rU)
			->where('dislike','=',1);
		}
		public function scopeUpDislike($query,$rB,$rU){
			return $query->where('book_id', '=', $rB)
			->where('user_id', '=', $rU)
			->update(['dislike' => 1,'like' => 0]);
		}
		public function scopeUpLike($query,$rB,$rU){
			return $query->where('book_id', '=', $rB)
			->where('user_id', '=', $rU)
			->update(['like' => 1,'dislike' =>0]);
		}
		
		public function scopeSumLike($query,$id){
			return $query->where('book_id', '=', $id)
			->sum('likes.like');
		}
		public function scopeSumDislike($query,$id){
			return $query->where('book_id', '=', $id)
			->sum('likes.dislike');
		}

		public function scopeCheckLike($query,$id){
			return $query->where('book_id', '=', $id)
			->where('user_id', '=', request()->User()->id)
			->where('like','=',1);
		}
		public function scopeCheckDislike($query,$id){
			return $query->where('book_id', '=', $id)
			->where('user_id', '=', request()->User()->id)
			->where('dislike','=',1);
		}
}