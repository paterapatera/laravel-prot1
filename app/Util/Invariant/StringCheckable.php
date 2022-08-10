<?php

namespace App\Util\Invariant;

use App\Util\Exception\StringLengthException;

trait StringCheckable
{
    /**
     * @param int<0, max> $max
     */
    function throwIfStrMaxOver(string $value, int $max): void
    {
        $length = mb_strlen($value);
        if ($length > $max) throw new StringLengthException("文字数の最大値より大きいです（期待値：{$max}、結果：{$length}）");
    }

    /**
     * @param int<0, max> $min
     */
    function throwIfStrMinOver(string $value, int $min): void
    {
        $length = mb_strlen($value);
        if ($length < $min) throw new StringLengthException("文字数の最小値より小さいです（期待値：{$min}、結果：{$length}）");
    }

    /**
     * @param int<0, max> $max
     * @param int<0, max> $min
     */
    function throwIfStrSizeOver(string $value, int $min, int $max): void
    {
        $this->throwIfStrMaxOver($value, $max);
        $this->throwIfStrMinOver($value, $min);
    }
}
