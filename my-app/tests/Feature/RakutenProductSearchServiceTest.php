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
        $request = new Request([]);

        $mock = \Mockery::mock(RakutenProductSearchService::class);
        $mock
            ->shouldReceive('exec')
            ->with($request, '483949379')
            ->once()
            ->andReturn([
                'name' => 'ガム',
                'url' => 'test url',
                'imageUrl' => 'test image url',
            ]);

        $this->assertEquals(
            [
                'name' => 'ガム',
                'url' => 'test url',
                'imageUrl' => 'test image url',
            ],
            $mock->exec($request, '483949379')
        );
    }
}
