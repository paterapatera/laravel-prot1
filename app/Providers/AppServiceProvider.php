<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Api\Post\App\ServiceProvider::regist($this->app);
        Api\Post\Domain\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
