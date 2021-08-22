<?php

namespace App\Providers;

use App\Services\RentalService;
use Illuminate\Support\ServiceProvider;

class RentalServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\RentalService', function($rentalService){
            return new RentalService();
        });
    }

    public function boot()
    {
        //
    }
}
