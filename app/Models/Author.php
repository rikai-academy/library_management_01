<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function Follow()
    {
        return $this->hasMany("App\Models\AuthorFollow", "author_id", "id");
    }

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "author_id", "id");
    }

    public function scopeLoadByNameAuthor($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }
}