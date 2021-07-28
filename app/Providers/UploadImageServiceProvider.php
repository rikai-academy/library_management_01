<?php

namespace App\Providers;

use App\Services\UploadImageService;
use Illuminate\Support\ServiceProvider;

class UploadImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Services\UploadImageService', function($uploadImageService){
            return new UploadImageService();
        });
    }

    public function boot()
    {
        //
    }
}
