<?php

namespace App\Application\Post\Create;

use App\Domain\Post\Post;
use App\Domain\Post\Repository;
use App\Domain\Post\IdGenerator;
use App\Domain\Post\Log\AddLogger;

class ServiceImpl implements Service
{
    function __construct(
        private IdGenerator $idGenerator,
        private Repository $repository,
        private AddLogger $addLogger
    ) {
    }

    function run(Input $input): void
    {
        $post = Post::of($this->idGenerator->generate(), $input->title);

        try {
            $this->addLogger->addStart($post);

            $this->repository->add($post);

            $this->addLogger->added($post);
        } catch (\Throwable $e) {
            $this->addLogger->addFailed($post);

            throw $e;
        }
    }
}
