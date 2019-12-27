<?php

declare(strict_types=1);

/*
    sig(Sophie\Confront\Testable::class)
        ->implements(Sophie\Confront\TestableInterface::class);
    sig(Sophie\Confront\Testable::class)
        ->method('__construct')
        ->accepts(
            Sophie\Confront\RunnableInterface::class,
            Generator::class
        );
*/

$runnable = mock(Sophie\Confront\RunnableInterface::class);
$runnable->expects()->run(1, 2)->andReturns(3);
$runnable->expects()->run(-20)->andReturns(-20);
$runnable->expects()->run('should fail')->andReturns('boom');

$testable = new Sophie\Confront\Testable(
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
} catch (Sophie\Confront\AssertionFailedException $e) {
    ++$exceptions;
}
assert($exceptions === 1);
