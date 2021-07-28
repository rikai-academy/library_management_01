<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function Follow()
    {
        return $this->hasMany("App\Models\AuthorFollow", "author_id", "id");
    }

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "author_id", "id");
    }

}
