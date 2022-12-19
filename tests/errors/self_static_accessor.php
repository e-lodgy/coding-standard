<?php

declare(strict_types=1);

final class Hello
{
    private const CONSTANT = '';

    public function __invoke(): void
    {
        static::CONSTANT;
    }
}
