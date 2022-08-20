<?php

namespace App\MyBlog\Application\Post\Search;

use App\MyBlog\Domain\Post\Post;

use function Eloquent\Phony\Kahlan\mock;

describe("MyBlog\Application\Post\Search\ServiceImpl", function () {
    beforeEach(function () {
        $this->query = mock(Query::class);
        $this->searchService = new ServiceImpl($this->query->get());

        $this->query->search->returns(collect([]));
    });

    describe("前提：Postリポジトリーに1件存在", function () {
        beforeEach(function () {
            $this->query->search->returns(collect([Post::of('12345678901234567890123456', 'title1')]));
        });

        context("条件：検索()", function () {
            beforeEach(function () {
                $this->execute = fn () => $this->searchService->run(new Input());
            });

            it("Postを1件取得", function () {
                $output = $this->execute();
                expect($output->posts->count())->toBe(1);
            });
        });
    });
});
