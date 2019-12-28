<?php

declare(strict_types=1);

namespace Sophie\Versus;

use Closure;
use Sophie\Ensure\StrictEqualityAssertion;

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
            $assertion = new StrictEqualityAssertion(
                $this->runnable->run(...$args),
                $return
            );
            $assertion->assert();
        }
    }
}
