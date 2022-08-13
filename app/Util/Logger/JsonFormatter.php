<?php

namespace App\Util\Logger;

use Carbon\CarbonImmutable;

use Monolog\Formatter\LineFormatter;

class JsonFormatter extends LineFormatter
{
    /**
     * @param array{
     *   message: string,
     *   context: array,
     *   level: 100|200|250|300|400|500|550|600,
     *   level_name: 'ALERT'|'CRITICAL'|'DEBUG'|'EMERGENCY'|'ERROR'|'INFO'|'NOTICE'|'WARNING',
     *   channel: string,
     *   datetime: \Monolog\DateTimeImmutable,
     *   extra: array
     * } $record
     */
    public function format($record): string
    {
        $log = json_encode([
            'datetime' => (new CarbonImmutable($record['datetime']))->timezone('Asia/Tokyo')->toAtomString(),
            'level' => $record['level_name'],
            'message' => $record['message'],
            ...$record['context'],
            // 'extra' => $record['extra']
        ], JSON_UNESCAPED_UNICODE) ?: '{}';
        return $log . "\n";
    }
}
