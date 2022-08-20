<?php

namespace App\MyBlog\Infra\Log;

class Logger
{
    static function behavior(string $feature, string $message): void
    {
        \Log::info($message, ['feature' => $feature, 'type' => 'behavior']);
    }

    static function error(string $feature, string $message): void
    {
        \Log::error($message, ['feature' => $feature, 'type' => 'behavior']);
    }

    // ユーザIDを含める
    // 指定IDを含める
    static function audit(string $feature, string $message, array $context): void
    {
        \Log::info($message, ['feature' => $feature, ...$context, 'type' => 'audit']);
    }

    static function auditError(string $feature, string $message, array $context): void
    {
        \Log::error($message, ['feature' => $feature, ...$context, 'type' => 'audit']);
    }

    static function exception(\Throwable $e): void
    {
        \Log::error($e->getMessage(), [
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'type' => 'error',
        ]);
    }
}
