<?php

declare(strict_types=1);

/*
    sig(Sophie\Confront\Runnable::class)
        ->implements(Sophie\Confront\RunnableInterface::class);
    sig(Sophie\Confront\Runnable::class)
        ->method('__construct')
        ->accepts('callable');
*/

$runnable = new Sophie\Confront\Runnable(fn ($n1, $n2) => $n1 + $n2);
assert($runnable->run(1, 2) === 3);
