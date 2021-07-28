<?php

namespace App\Providers;

use App\Services\BookService;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\BookService', function($bookService){
            return new BookService();
        });
    }

    public function boot()
    {
        //
    }
}
