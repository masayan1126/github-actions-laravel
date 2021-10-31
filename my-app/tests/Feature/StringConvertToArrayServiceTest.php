<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Zaico\Application\String\StringConvertToArrayService;
use Zaico\Domain\String\Str;

class StringConvertToArrayServiceTest extends TestCase
{
    /**
     * @test
     */
    public function カンマ区切りで文字列を配列に変換できること()
    {
        $string = 'PHP,Ruby,Java,Python';
        $str = new Str($string);
        $stringConvertToArrayService = new StringConvertToArrayService($str);
        $option = ',';

        $expect = ['PHP', 'Ruby', 'Java', 'Python'];
        $result = $stringConvertToArrayService->exec($option);
        $this->assertEquals($expect, $result);
    }
}
