<?php

declare(strict_types=1);

try {
    $a = 12;
} catch (\ErrorException|\Throwable $e) {
    // Do something
}
