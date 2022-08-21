<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Auth\Application\ServiceProvider::regist($this->app);
        Auth\Domain\ServiceProvider::regist($this->app);
        MyBlog\Application\ServiceProvider::regist($this->app);
        MyBlog\Domain\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
