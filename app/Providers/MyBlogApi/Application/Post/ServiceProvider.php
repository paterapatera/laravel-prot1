<?php

namespace App\Providers\MyBlogApi\Application\Post;

use Illuminate\Contracts\Foundation\Application as App;
use App\MyBlogApi\Application;
use App\MyBlogApi\Infra;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        $app->singleton(Application\Post\Search\Service::class, fn ($a) => $a->make(Application\Post\Search\ServiceImpl::class));
        $app->singleton(Application\Post\Create\Service::class, fn ($a) => $a->make(Application\Post\Create\ServiceImpl::class));
        $app->singleton(Application\Post\Search\Query::class, fn ($a) => $a->make(Infra\Application\Post\Search\Query::class));
        $app->singleton(Application\Post\Create\Logger::class, fn ($a) => $a->make(Infra\Application\Post\Create\Logger::class));
    }
}
