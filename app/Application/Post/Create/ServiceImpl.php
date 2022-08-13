<?php

namespace App\Application\Post\Create;

use App\Domain\Post\Post;
use App\Domain\Post\Repository;
use App\Domain\Post\IdGenerator;
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
            $this->publisher->send('faild', $post);

            throw $e;
        }
    }
}
