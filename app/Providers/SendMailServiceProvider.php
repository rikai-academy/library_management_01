<?php

namespace App\Providers;

use App\Services\SendMailService;
use Illuminate\Support\ServiceProvider;

class SendMailServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\SendMailService', function($sendMailService){
            return new SendMailService();
        });
    }

    public function boot()
    {
        //
    }
}
