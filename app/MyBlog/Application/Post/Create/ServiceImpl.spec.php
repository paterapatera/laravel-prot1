<?php

namespace App\MyBlog\Application\Post\Create;

use App\MyBlog\Domain\Post\Repository;
use App\MyBlog\Domain\Post\IdGenerator;
use App\MyBlog\Domain\Post\Post;
use Kahlan\Arg;
use function Eloquent\Phony\Kahlan\mock;

describe("MyBlog\Application\Post\Create\ServiceImpl", function () {
    beforeEach(function () {
        $this->idGenerator = mock(IdGenerator::class);
        $this->repository = mock(Repository::class);
        $this->logSub = mock(Subscriber\Log::class);
        $this->createService = new ServiceImpl($this->idGenerator->get(), $this->repository->get(), $this->logSub->get());

        $this->idGenerator->generate->returns('');
        $this->logSub->run->returns(null);
        $this->repository->add->returns(null);
    });

    describe("前提：生成ID = '12345678901234567890123456'", function () {
        beforeEach(function () {
            $this->idGenerator->generate->returns('12345678901234567890123456');
        });

        context("条件：作成(['title' => 'title1'])", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->createService->run(new Input('title1'));
            });

            it("開始ログを実行", function () {
                $this->execute();
                $this->logSub->run->calledWith('start', Arg::toBeAnInstanceOf(Post::class));
            });

            it("Post([\n" .
                "    'id' => '12345678901234567890123456',\n" .
                "    'title' => 'title1',\n" .
                "])をリポジトリに追加", function () {
                $this->execute();
                $arg0 = $this->repository->add->lastCall()->argument(0)->val();
                expect($arg0->id)->toBe('12345678901234567890123456');
                expect($arg0->title)->toBe('title1');
            });

            it("終了ログを実行", function () {
                $this->execute();
                $this->logSub->run->calledWith('finish', Arg::toBeAnInstanceOf(Post::class));
            });
        });
    });

    describe("前提：生成ID = '12345678901234567890123456'\n" .
        "　　　リポジトリ追加時にエラーが発生", function () {
        beforeEach(function () {
            $this->idGenerator->generate->returns('12345678901234567890123456');
            $this->repository->add->throws(new \TypeError());
        });

        context("条件：作成(['title' => 'title1'])", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->createService->run(new Input('title1'));
            });

            it("失敗ログを実行", function () {
                expect($this->execute)->toThrow();
                $this->logSub->run->calledWith('failed', Arg::toBeAnInstanceOf(Post::class));
            });

            it("エラー", function () {
                expect($this->execute)->toThrow(new \TypeError());
            });
        });
    });
});
