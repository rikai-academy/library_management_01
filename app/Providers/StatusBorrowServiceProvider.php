<?php

namespace App\Providers;

use App\Services\StatusBorrowService;
use Illuminate\Support\ServiceProvider;

class StatusBorrowServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\StatusBorrowService', function($statusBorrowService){
            return new StatusBorrowService();
        });
    }

    public function boot()
    {
        //
    }
}
