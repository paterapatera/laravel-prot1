<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Api\Post\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
