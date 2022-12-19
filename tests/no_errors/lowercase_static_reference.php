<?php

declare(strict_types=1);

class A
{
    private StdClass $a;

    public function __construct()
    {
        $this->a = new \StdClass();
    }
}

class B extends A
{
    public function __construct()
    {
        parent::__construct();
    }
}
