<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    /**
     * @test
     */
    public function test_example()
    {
        $expect = 4;
        $this->assertSame($expect, 2 * 2);
    }
}
