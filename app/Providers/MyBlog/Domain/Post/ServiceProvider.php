<?php

namespace App\Providers\MyBlog\Domain\Post;

use Illuminate\Contracts\Foundation\Application as App;
use App\MyBlog\Infra;
use App\MyBlog\Domain;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        $app->singleton(Domain\Post\Repository::class, fn ($a) => $a->make(Infra\Domain\Post\Repository::class));
        $app->singleton(Domain\Post\IdGenerator::class, fn ($a) => $a->make(Infra\Domain\Post\IdGenerator::class));
        $app->singleton(Domain\Post\Log\AddLogger::class, fn ($a) => $a->make(Infra\Domain\Post\Log\AddLogger::class));
    }
}
