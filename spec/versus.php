<?php

declare(strict_types=1);

$called = 0;
$failed = 0;

try {
    Sophie\Versus\versus(
        function ($n1, $n2) use (&$called) {
            ++$called;
            return $n1 + $n2;
        },
        function () {
            yield [1, 2] => 3;
            yield [-2, -3] => -5;
            yield [10, -20] => 0;
        }
    );
} catch (Sophie\Ensure\FailedAssertionException $e) {
    ++$failed;
}

assert($called === 3);
assert($failed === 1);
