<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Zaico\Application\Array\ArrayDeleteEmptyElementService;
use Zaico\Domain\String\Str;

class ArrayDeleteEmptyElementServiceTest extends TestCase
{
    /**
     * @test
     */
    public function 配列から空文字の要素のみを削除できること()
    {
        $str = new Str("string class");
        $array = [$str, "PHP","Ruby","","Python",false, "false", null, "","0",0];
        $arrayDeleteEmptyElementService = new ArrayDeleteEmptyElementService($array);

        $expect = [$str, "PHP","Ruby","Python",false, "false", null, "0",0];
        $result = $arrayDeleteEmptyElementService->exec();
        $this->assertEquals($expect, $result);
    }
}