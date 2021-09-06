<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Spatie\Searchable\Search;

class SearchService
{
    public function search($search_term)
    {
        return $searchResults = (new Search())
            ->registerModel(Book::class, ['name', 'desc'])
            ->registerModel(Author::class, ['name', 'desc'])
            ->registerModel(Publisher::class, ['name', 'desc'])
            ->registerModel(Category::class, ['name', 'desc'])
            ->perform($search_term);
    }
}
