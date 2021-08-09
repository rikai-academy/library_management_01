<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
		protected $with = ['category','Author'];
    public function category()
    {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }

    public function comment()
    {
        return $this->hasMany("App\Models\Comment");
    }

    public function publisher()
    {
        return $this->belongsTo("App\Models\Publisher", "publisher_id", "id");
    }

    // public function likeBook()
    // {
    //     return $this->hasMany("", "like_id", "id");
		// }
		public function likes(){
			return $this->hasMany("App\Models\Like","book_id")->sum('like');
	}
	
	public function dislikes(){
			return $this->hasMany("App\Models\Like","book_id")->sum('dislike');
	}

    public function Author()
    {
        return $this->belongsTo("App\Models\Author", "author_id", "id");
    }

    public function Borrowed()
    {
        return $this->hasMany("App\Models\BorrowedBook", "book_id", "id");
    }

    public function Rate()
    {
        return $this->hasMany("App\Models\Rate", "book_id", "id");
    }

    public function Follow()
    {
        return $this->hasMany("App\Models\BookFollow", "book_id", "id");
    }
    
}