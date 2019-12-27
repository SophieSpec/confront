<?php

declare(strict_types=1);

namespace Sophie\Confront;

/**
 * Handle a callable.
 */
final class Runnable implements RunnableInterface
{
    /**
     * @var callable
     */
    private $callable;

    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * @param  mixed ...$args
     * @return mixed
     */
    public function run(...$args)
    {
        return call_user_func_array($this->callable, $args);
    }
}
