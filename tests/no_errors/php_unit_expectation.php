<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testMe(): void
    {
        $this->expectException('RuntimeException');
        $this->expectExceptionMessage('Msg');
        $this->expectExceptionCode(123);
    }
}
