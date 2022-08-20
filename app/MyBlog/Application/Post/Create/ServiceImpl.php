<?php

namespace App\MyBlog\Application\Post\Create;

use App\MyBlog\Domain\Post\Post;
use App\MyBlog\Domain\Post\Repository;
use App\MyBlog\Domain\Post\IdGenerator;
use App\Util\PubSub\Publisher;

class ServiceImpl implements Service
{
    /** @var Publisher<Post> */
    private Publisher $publisher;

    function __construct(
        private IdGenerator $idGenerator,
        private Repository $repository,
        private Subscriber\Log $logSub
    ) {
        $this->publisher = new Publisher();
        $this->publisher->add($this->logSub);
    }

    function run(Input $input): void
    {
        $post = Post::of($this->idGenerator->generate(), $input->title);

        try {
            $this->publisher->send('start', $post);

            $this->repository->add($post);

            $this->publisher->send('finish', $post);
        } catch (\Throwable $e) {
            $this->publisher->send('failed', $post);

            throw $e;
        }
    }
}
