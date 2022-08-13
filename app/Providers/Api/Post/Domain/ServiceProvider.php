<?php

namespace App\Providers\Api\Post\Domain;

use Illuminate\Contracts\Foundation\Application as App;
use App\Application;
use App\Infra;
use App\Domain;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        $app->bind(Domain\Post\Repository::class, fn ($a) => $a->make(Infra\Post\Repository::class));
        $app->bind(Domain\Post\IdGenerator::class, fn ($a) => $a->make(Infra\Post\IdGenerator::class));
        $app->bind(Domain\Post\Log\CreateLogger::class, fn ($a) => $a->make(Infra\Post\Log\CreateLogger::class));
    }
}
