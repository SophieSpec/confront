<?php

declare(strict_types=1);

$runnable = new Sophie\Versus\Runnable(fn ($n1, $n2) => $n1 + $n2);
assert($runnable->run(1, 2) === 3);
