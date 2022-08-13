<?php

namespace App\Infra\Post\Log;

use App\Application\Post\Create\Input;
use App\Application\Post\Create\Logger as AppCreateLogger;
use App\Domain\Post\Log\CreateLogger as DomainCreateLogger;
use App\Domain\Post\Post;
use App\Infra\Log\Logger;

class CreateLogger implements DomainCreateLogger, AppCreateLogger
{
    const FEATURE = 'ポスト作成';

    function create(Post $post): void
    {
        $message = '作成';
        $data = $post->toObject();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function created(Post $post): void
    {
        $message = '作成完了';
        $data = $post->toObject();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function createFailed(Post $post): void
    {
        $message = '作成失敗';
        $data = $post->toObject();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::error(self::FEATURE, $message);
    }

    function start(Input $input): void
    {
        $message = '開始';
        Logger::audit(self::FEATURE, $message, ['title' => $input->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function finish(): void
    {
        $message = '終了';
        Logger::audit(self::FEATURE, $message, []);
        Logger::behavior(self::FEATURE, $message);
    }
}
