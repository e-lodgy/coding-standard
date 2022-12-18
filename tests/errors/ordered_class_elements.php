<?php

declare(strict_types=1);

trait Salut
{
}

class Hello
{
    private string $hello;
    public int $yo;

    protected const HI = '';

    use Salut;
}
