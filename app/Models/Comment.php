<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
		protected $fillable = ['user_id','desc_comment','book_id'];
    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function Book()
    {
        return $this->belongsTo("App\Models\Book", "book_id");
    }
}