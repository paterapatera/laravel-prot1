<?php

namespace App\Infra\Log;

class Logger
{
    function behavior(string $feature, string $message): void
    {
        \Log::info($message, ['feature' => $feature, 'type' => 'behavior']);
    }

    // ユーザIDを含める
    // 指定IDを含める
    function audit(string $feature, string $message, array $context): void
    {
        \Log::info($message, ['feature' => $feature, ...$context, 'type' => 'audit']);
    }

    function exception(\Throwable $e): void
    {
        \Log::error($e->getMessage(), [
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'type' => 'error',
        ]);
    }
}
