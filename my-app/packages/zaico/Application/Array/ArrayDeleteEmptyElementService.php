<?php
/**
 * 配列から空文字の要素のみを削除します
 */
namespace Zaico\Application\Array;

class ArrayDeleteEmptyElementService
{
    private array $array = [];

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function exec():  array
    {
        // 文字列型でない、またはバイト数が0
        // false, null, ""のバイト数は0
        return array_values(array_filter($this->array, fn ($elem) => !is_string($elem) || mb_strlen($elem)));
    }
}