<?php

namespace App\Providers;

use App\Services\LoginFBService;
use Illuminate\Support\ServiceProvider;

class LoginFBServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\LoginFBService', function($loginFBService){
            return new LoginFBService();
        });
    }

    public function boot()
    {
        //
    }
}
