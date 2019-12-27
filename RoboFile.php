<?php

declare(strict_types=1);

final class RoboFile extends Robo\Tasks
{
    public function publish(string $version): void
    {
        $this->_exec('git checkout master');
        $this->_exec("git tag $version");
        $this->_exec('git push');
        $this->_exec('git push --tags');
    }
}
