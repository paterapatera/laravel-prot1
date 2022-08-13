<?php

namespace App\Providers\Api\Post\App;

use Illuminate\Contracts\Foundation\Application as App;
use App\Application;
use App\Infra;
use App\Domain;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        $app->bind(Application\Post\Search\Query::class, fn ($a) => new Infra\Post\SearchQuery());
        $app->bind(Application\Post\Search\Service::class, fn ($a) => $a->make(Application\Post\Search\ServiceImpl::class));
        $app->bind(Application\Post\Create\Service::class, fn ($a) => $a->make(Application\Post\Create\ServiceImpl::class));
        $app->bind(Application\Post\Create\Logger::class, fn ($a) => $a->make(Infra\Post\Log\CreateLogger::class));
    }
}
