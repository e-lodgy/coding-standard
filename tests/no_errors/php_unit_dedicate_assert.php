<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TestDedicateAssert extends TestCase
{
    public function testAssert(): void
    {
        $this->assertIsFloat('mock');
    }
}
