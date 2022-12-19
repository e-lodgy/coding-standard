<?php

declare(strict_types=1);

trait Salut
{
}

class Hello
{
    use Salut;

    protected const HI = '';
    public int $yo;
    private string $hello;
}
