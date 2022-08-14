<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        MyBlogApi\Application\ServiceProvider::regist($this->app);
        MyBlogApi\Domain\ServiceProvider::regist($this->app);
    }

    public function boot(): void
    {
        //
    }
}
