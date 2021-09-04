<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;

class SearchAdminController extends Controller
{
    public function __construct()
    {
        $this->searchService = new SearchService;
    }

    public function index()
    {
        return view('Admin.Search.search_full_text');
    }
    public function search(Request $request)
    {
        $search_term = $request->input('query');

        if (isset($search_term)) {
            $searchResults = $this->searchService->search($search_term);
            return view('Admin.Search.search_full_text', compact('searchResults', 'search_term'));
        } else {
            return back();
        }
    }

    public function searchUser(Request $request)
    {
        $search_term = $request->input('query');

        if (isset($search_term)) {
            $searchResults = $this->searchService->search($search_term);
            return view('layouts.user.search', compact('searchResults', 'search_term'));
        } else {
            return back();
        }
    }
}
