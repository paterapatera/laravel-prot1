<?php

namespace App\MyBlog\Application\Post\Search;

use App\MyBlog\Domain\Post\Post;
use PHPUnit\Framework\TestCase;

class ServiceImplTestS extends TestCase
{
    /**
     * @test
     */
    public function search_posts_0(): void
    {
        // 前提： Postが0件登録されていること
        $query = $this->createStub(Query::class);
        $query->method('search')->willReturn(collect([]));

        $service = new ServiceImpl($query);

        // 条件： 条件無しで取得する場合
        $result = $service->run(new Input());

        // 結果： 取得したPostが0件であること
        $this->assertCount(0, $result->posts);
    }

    /**
     * @test
     */
    public function search_posts_1(): void
    {
        // 前提： Postが1件登録されていること
        $query = $this->createStub(Query::class);
        $query->method('search')
            ->willReturn(collect([Post::of('12345678901234567890123456', 'test')]));

        $service = new ServiceImpl($query);

        // 条件： 条件無しで取得する場合
        $result = $service->run(new Input());

        // 結果： 取得したPostが1件であること
        $this->assertEquals(1, $result->posts->count());

        // 結果： 取得した先頭のPostのIDが12345678901234567890123456であること
        $this->assertEquals('12345678901234567890123456', $result->posts->first()?->val()->id);

        // 結果： 取得した先頭のPostのタイトルがtestであること
        $this->assertEquals('test', $result->posts->first()?->val()->title);
    }
}
