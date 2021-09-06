<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Author extends Model implements Searchable
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
        if ($name = request()->name) {
            $query = $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function getSearchResult(): SearchResult
    {
        $name_author = 'name='.$this->name;
        $url = route('author.index',$name_author);
        $url_user = route('author.index', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url,
            $url_user,
        );
    }
}
