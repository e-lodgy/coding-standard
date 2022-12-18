<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ECSTest extends TestCase
{
    /** @test */
    public function ecsErrorJsonFile(): void
    {
        $json = file_get_contents(__DIR__ . '/../ecs_errors.json');
        $json = json_decode($json, true);

        $this->assertNotEmpty($json);

        $diffsCount = \PHP_VERSION_ID >= 80000 ? 70 : 69;
        $this->assertCount($diffsCount, $json['files']);
        $this->assertSame($diffsCount, $json['totals']['diffs']);
        $this->assertSame(0, $json['totals']['errors']);
    }

    /** @test */
    public function ecsNoErrorJsonFile(): void
    {
        $json = file_get_contents(__DIR__ . '/../ecs_no_errors.json');
        $json = json_decode($json, true);

        $this->assertNotEmpty($json);
        $this->assertCount(0, $json['files']);
        $this->assertSame(0, $json['totals']['diffs']);
        $this->assertSame(0, $json['totals']['errors']);
    }
}
