<?php

namespace App\Util\PubSub;

use Illuminate\Support\Collection;

/**
 * @template TRes
 */
class Publisher
{
    /** @var Collection<int, Subscriber<TRes>> */
    private Collection $subscribers;

    function __construct()
    {
        /** @var array<int, Subscriber<TRes>> */
        $subscribers = [];
        $this->subscribers = collect($subscribers);
    }

    /**
     * @param Subscriber<TRes> $sub
     */
    function add(Subscriber $sub): void
    {
        $this->subscribers->add($sub);
    }

    /**
     * @param TRes $resourece
     */
    function send(string $event, $resourece): void
    {
        $this->subscribers->each(fn ($s) => $s->run($event, $resourece));
    }
}
