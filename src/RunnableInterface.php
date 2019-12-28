<?php

declare(strict_types=1);

namespace Sophie\Versus;

interface RunnableInterface
{
    /**
     * @param  mixed ...$args
     * @return mixed
     */
    public function run(...$args);
}
