<?php

namespace App\Util\PubSub;

/**
 * @template TRes
 */
interface Subscriber
{
    /**
     * @param TRes $resource
     */
    function run(string $event, $resource): void;
}
