<?php

namespace App\Providers\Api\Post;

use Illuminate\Contracts\Foundation\Application as App;
use App\Application;
use App\Infra;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        $app->bind(Application\Post\Search\Query::class, fn ($a) => new Infra\Post\SearchQuery());
        $app->bind(Application\Post\Search\Service::class, fn ($a) => $a->make(Application\Post\Search\ServiceImpl::class));
    }
}
