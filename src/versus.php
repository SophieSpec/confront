<?php

declare(strict_types=1);

namespace Sophie\Versus;

use Closure;

/**
 * Facade.
 */
function versus(callable $callable, Closure $dataset): void
{
    $testable = new Testable(
        new Runnable($callable),
        $dataset
    );
    $testable->test();
}
