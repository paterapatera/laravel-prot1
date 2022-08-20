<?php

namespace App\MyBlog\Application\Post\Create;

use App\MyBlog\Domain\Post\Post;
use App\MyBlog\Domain\Post\Repository;
use App\MyBlog\Domain\Post\IdGenerator;
use PHPUnit\Framework\TestCase;

class ServiceImplTestS extends TestCase
{
    /**
     * @test
     */
    public function create_id_12345678901234567890123456(): void
    {
        // 前提：生成ID = '12345678901234567890123456'
        $idGen = \Mockery::mock(IdGenerator::class);
        $idGen->shouldReceive('generate')->andReturn('12345678901234567890123456');

        // 条件：作成(['title' => 'title1'])
        $input = new Input('test');

        // 結果：Post([
        //           'id' => '12345678901234567890123456',
        //           'title' => 'title1',
        //     ])をリポジトリに追加
        $repo = \Mockery::mock(Repository::class);
        $repo->shouldReceive('add')
            ->with(\Mockery::on(fn ($v) => $v == Post::of('12345678901234567890123456', 'test')))->once();

        $logSub = \Mockery::spy(Subscriber\Log::class);

        $service = new ServiceImpl($idGen, $repo, $logSub);

        // 条件： {タイトル: test}で作成する場合
        $service->run(new Input('test'));

        // 結果： 開始のログを実行
        $logSub->shouldHaveReceived('run')->with('start', \Mockery::on(fn () => true))->once();

        // 結果： 終了のログを実行
        $logSub->shouldHaveReceived('run')->with('finish', \Mockery::on(fn () => true))->once();

        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function create_add_error(): void
    {
        // 前提：生成ID = '12345678901234567890123456'
        // 　　　リポジトリ追加時にエラーが発生
        $idGen = \Mockery::mock(IdGenerator::class);
        $idGen->shouldReceive('generate')->andReturn('12345678901234567890123456');

        // 結果：エラー
        $repo = \Mockery::mock(Repository::class);
        $repo->shouldReceive('add')->andThrow(new \TypeError());
        $this->expectException(\TypeError::class);

        $logSub = \Mockery::spy(Subscriber\Log::class);

        $service = new ServiceImpl($idGen, $repo, $logSub);

        // 条件：作成(['title' => 'title1'])
        $service->run(new Input('test'));

        // 結果： 開始のログを実行
        $logSub->shouldHaveReceived('run')->with('start', \Mockery::on(fn () => true))->once();

        // 結果： 終了のログを実行
        $logSub->shouldHaveReceived('run')->with('failed', \Mockery::on(fn () => true))->once();
    }
}
