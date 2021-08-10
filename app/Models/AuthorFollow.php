<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorFollow extends Model
{
		use HasFactory;
		protected $fillable = ['user_id','follow','author_id'];

    public function Author()
    {
        return $this->belongsTo("App\Models\Author", "author_id");
    }

    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id");
		}
		
		public function scopeGetFollow($query,$requestAuthor,$requestUser){
			return $query->where('author_id', '=', $requestAuthor)
			->where('user_id', '=',$requestUser)
			->where('follow','=',1);
		}
		public function scopeGetUnFollow($query,$requestAuthor,$requestUser){
			return $query->where('author_id', '=', $requestAuthor)
			->where('user_id', '=',$requestUser)
			->where('follow','=',0);
		}
		public function scopeUpFollow($query,$requestAuthor,$requestUser){
			return $query->where('author_id', '=', $requestAuthor)
			->where('user_id', '=', $requestUser)
			->update(['follow' => 1]);
		}
		public function scopeUpUnFollow($query,$requestAuthor,$requestUser){
			return $query->where('author_id', '=', $requestAuthor)
			->where('user_id', '=', $requestUser)
			->update(['follow' => 0]);
		}
		public function scopeSumFollow($query,$author){
			return $query->where('author_id', '=', $author)
			->sum('author_follows.follow');
		}
		public function scopeCheckFollow($query,$author){
			return $query->where('author_id', '=', $author)
			->where('user_id', '=', request()->User()->id)
			->where('follow','=',1);
		}
		public function scopeCheckUnFollow($query,$author){
			return $query->where('author_id', '=', $author)
			->where('user_id', '=', request()->User()->id)
			->where('follow','=',0);
		}
}