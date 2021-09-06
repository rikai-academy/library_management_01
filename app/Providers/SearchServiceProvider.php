<?php

namespace App\Providers;

use App\Services\SearchService;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\SearchService', function ($searchService) {
            return new SearchService();
        });
    }

    public function boot()
    {
        //
    }
}
