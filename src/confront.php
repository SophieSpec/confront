<?php

declare(strict_types=1);

namespace Sophie\Confront;

use Closure;

/**
 * Facade.
 */
function confront(callable $callable, Closure $dataset): void
{
    $testable = new Testable(
        new Runnable($callable),
        $dataset
    );
    $testable->test();
}
