<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFollow extends Model
{
    use HasFactory;
		protected $fillable = ['user_id','book_id','follow'];
    public function Book()
    {
        return $this->belongsTo("App\Models\Book", "book_id");
    }

    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id");
		}
		
		public function scopeGetFollow($query,$requestBook,$requestUser){
			return $query->where('book_id', '=', $requestBook)
			->where('user_id', '=',$requestUser)
			->where('follow','=',1);
		}
		public function scopeGetUnFollow($query,$requestBook,$requestUser){
			return $query->where('book_id', '=', $requestBook)
			->where('user_id', '=',$requestUser)
			->where('follow','=',0);
		}
		public function scopeUpFollow($query,$requestBook,$requestUser){
			return $query->where('book_id', '=', $requestBook)
			->where('user_id', '=', $requestUser)
			->update(['follow' => 1]);
		}
		public function scopeUpUnFollow($query,$requestBook,$requestUser){
			return $query->where('book_id', '=', $requestBook)
			->where('user_id', '=', $requestUser)
			->update(['follow' => 0]);
		}
		public function scopeSumFollow($query,$id){
			return $query->where('book_id', '=', $id)
			->sum('book_follows.follow');
		}
		public function scopeCheckFollow($query,$id){
			return $query->where('book_id', '=', $id)
			->where('user_id', '=', request()->User()->id)
			->where('follow','=',1);
		}
		public function scopeCheckUnFollow($query,$id){
			return $query->where('book_id', '=', $id)
			->where('user_id', '=', request()->User()->id)
			->where('follow','=',0);
		}
}