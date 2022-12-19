<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testMe(): void
    {
        $this->setExpectedException('RuntimeException', 'Msg', 123);
    }
}
