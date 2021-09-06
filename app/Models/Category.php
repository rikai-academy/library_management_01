<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "category_id", "id");
    }
    public function scopeLoadByNameCate($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('category.index', $this->name);
        $url_user = route('category.index', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url,
            $url_user
        );
    }
}
