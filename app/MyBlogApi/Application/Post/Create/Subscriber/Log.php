<?php

namespace App\MyBlogApi\Application\Post\Create\Subscriber;

use App\MyBlogApi\Domain\Post\Log\AddLogger;
use App\MyBlogApi\Domain\Post\Post;
use App\Util\PubSub\Subscriber;

/**
 * @implements Subscriber<Post>
 */
class Log implements Subscriber
{
    function __construct(private AddLogger $addLogger)
    {
    }

    /**
     * @param Post $resource
     */
    function run(string $event, $resource): void
    {
        switch ($event) {
            case 'start':
                $this->addLogger->addStart($resource);
                break;
            case 'finish':
                $this->addLogger->addFinish($resource);
                break;
            case 'failed':
                $this->addLogger->addFailed($resource);
                break;
            default:
        };
    }
}
