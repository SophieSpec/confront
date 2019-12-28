<?php

declare(strict_types=1);

/*
    sig(Sophie\Versus\Testable::class)
        ->implements(Sophie\Versus\TestableInterface::class);
    sig(Sophie\Versus\Testable::class)
        ->method('__construct')
        ->accepts(
            Sophie\Versus\RunnableInterface::class,
            Generator::class
        );
*/

$runnable = mock(Sophie\Versus\RunnableInterface::class);
$runnable->expects()->run(1, 2)->andReturns(3);
$runnable->expects()->run(-20)->andReturns(-20);
$runnable->expects()->run('should fail')->andReturns('boom');

$testable = new Sophie\Versus\Testable(
    $runnable, // intelephense does not understand mocks
    function () {
        yield [1, 2] => 3;
        yield -20 => -20;
        yield 'should fail' => 'should fail';
    }
);

$exceptions = 0;
try {
    $testable->test();
} catch (Sophie\Ensure\FailedAssertionException $e) {
    ++$exceptions;
}
assert($exceptions === 1);
