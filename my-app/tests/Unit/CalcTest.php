<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class CalcTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $expect = 4;
        $this->assertSame($expect, 2 * 2);
    }
}
