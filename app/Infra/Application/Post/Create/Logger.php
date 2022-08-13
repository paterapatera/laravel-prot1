<?php

namespace App\Infra\Application\Post\Create;

use App\Application\Post\Create\Input;
use App\Application\Post\Create\Logger as AppCreateLogger;
use App\Infra\Log\Logger as InfraLogger;

class Logger implements AppCreateLogger
{
    const FEATURE = 'ポスト作成';

    function start(Input $input): void
    {
        $message = '開始';
        InfraLogger::audit(self::FEATURE, $message, ['title' => $input->title]);
        InfraLogger::behavior(self::FEATURE, $message);
    }

    function finish(): void
    {
        $message = '終了';
        InfraLogger::audit(self::FEATURE, $message, []);
        InfraLogger::behavior(self::FEATURE, $message);
    }
}
