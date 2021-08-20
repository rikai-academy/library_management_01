<?php

namespace App\Providers;

use App\Services\BorrowBookService;
use Illuminate\Support\ServiceProvider;

class BorrowBookProvide extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\BorrowBookService', function($borrowBookService){
            return new BorrowBookService();
        });
    }

    public function boot()
    {
        //
    }
}
