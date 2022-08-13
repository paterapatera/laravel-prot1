<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Application\ServiceProvider::regist($this->app);
        Domain\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
