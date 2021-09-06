<?php

namespace App\Providers;

use App\Services\NotifyService;
use Illuminate\Support\ServiceProvider;


class NotifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\NotifyService', function($notifyService){
            return new NotifyService();
        });
    }

    public function boot()
    {
        //
    }
}
