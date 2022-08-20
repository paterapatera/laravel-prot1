<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        MyBlog\Application\ServiceProvider::regist($this->app);
        MyBlog\Domain\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
