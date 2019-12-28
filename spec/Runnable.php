<?php

declare(strict_types=1);

/*
    sig(Sophie\Versus\Runnable::class)
        ->implements(Sophie\Versus\RunnableInterface::class);
    sig(Sophie\Versus\Runnable::class)
        ->method('__construct')
        ->accepts('callable');
*/

$runnable = new Sophie\Versus\Runnable(fn ($n1, $n2) => $n1 + $n2);
assert($runnable->run(1, 2) === 3);
