<?php

namespace App\Providers\Application;

use Illuminate\Contracts\Foundation\Application as App;

class ServiceProvider
{
    static public function regist(App $app): void
    {
        Post\ServiceProvider::regist($app);
    }
}
