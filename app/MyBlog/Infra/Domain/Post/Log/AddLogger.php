<?php

namespace App\MyBlog\Infra\Domain\Post\Log;

use App\MyBlog\Domain\Post\Log\AddLogger as DomainAddLogger;
use App\MyBlog\Domain\Post\Post;
use App\MyBlog\Infra\Log\Logger;

class AddLogger implements DomainAddLogger
{
    const FEATURE = 'ポスト追加';

    function addStart(Post $post): void
    {
        $message = '追加開始';
        $data = $post->val();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function addFinish(Post $post): void
    {
        $message = '追加完了';
        $data = $post->val();
        Logger::audit(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::behavior(self::FEATURE, $message);
    }

    function addFailed(Post $post): void
    {
        $message = '追加失敗';
        $data = $post->val();
        Logger::auditError(self::FEATURE, $message, ['id' => $data->id, 'title' => $data->title]);
        Logger::error(self::FEATURE, $message);
    }
}
