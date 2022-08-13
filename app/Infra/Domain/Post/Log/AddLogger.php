<?php

namespace App\Infra\Domain\Post\Log;

use App\Domain\Post\Log\AddLogger as DomainAddLogger;
use App\Domain\Post\Post;
use App\Infra\Log\Logger;

class AddLogger implements DomainAddLogger
{
    const FEATURE = 'ポスト追加';

    function addStart(Post $post): void
    {
        $message = '追加開始';
        $data = $post->toObject();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function added(Post $post): void
    {
        $message = '追加完了';
        $data = $post->toObject();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function addFailed(Post $post): void
    {
        $message = '追加失敗';
        $data = $post->toObject();
        Logger::auditError(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::error(self::FEATURE, $message);
    }
}
