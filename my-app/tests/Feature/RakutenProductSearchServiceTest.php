<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Zaico\Application\RakutenProduct\RakutenProductSearchService;

class RakutenProductSearchServiceTest extends TestCase
{
    /**
     * @test
     */
    public function 楽天商品を検索して取得できること()
    {
        $mock = \Mockery::mock(RakutenProductSearchService::class);
        $mock
            ->shouldReceive('exec')
            ->once()
            ->andReturn([]);

        $request = new Request([]);

        $this->assertEquals([], $mock->exec($request, '483949379'));
    }
}
