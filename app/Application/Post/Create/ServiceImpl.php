<?php

namespace App\Application\Post\Create;

use App\Domain\Post\Id;
use App\Domain\Post\Post;
use App\Domain\Post\Repository;
use App\Domain\Post\IdGenerator;
use App\Domain\Post\Log\CreateLogger;

class ServiceImpl implements Service
{
    function __construct(
        private IdGenerator $idGenerator,
        private Repository $repository,
        private CreateLogger $createLogger
    ) {
    }

    function run(Input $input): void
    {
        $post = Post::of($this->idGenerator->generate(), $input->title);

        try {
            $this->createLogger->create($post);

            $this->repository->add($post);

            $this->createLogger->created($post);
        } catch (\Throwable $e) {
            $this->createLogger->createFailed($post);

            throw $e;
        }
    }
}
