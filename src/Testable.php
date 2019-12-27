<?php

declare(strict_types=1);

namespace Sophie\Confront;

use Closure;

/**
 * Test a runnable.
 */
final class Testable implements TestableInterface
{
    /**
     * @var RunnableInterface
     */
    private RunnableInterface $runnable;

    /**
     * @var callable
     */
    private $dataset;

    public function __construct(RunnableInterface $runnable, Closure $dataset)
    {
        $this->runnable = $runnable;
        $this->dataset = $dataset;
    }

    public function test(): void
    {
        /** @var mixed */
        foreach (($this->dataset)() as $args => $return) {
            $args = (array) $args;
            if ($this->runnable->run(...$args) !== $return) {
                throw new AssertionFailedException(
                    'The callable has not returned a valid value'
                );
            }
        }
    }
}
