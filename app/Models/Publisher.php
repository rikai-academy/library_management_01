<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Publisher extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "publisher_id", "id");
    }

    public function scopeLoadByNamePublisher($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('publisher.index', $this->name);
        $url_user = route('publisher.index', $this->id);
        return new SearchResult(
            $this,
            $this->name,
            $url,
            $url_user
        );
    }
}
