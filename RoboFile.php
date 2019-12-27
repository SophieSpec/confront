<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

final class RoboFile extends Robo\Tasks
{
    public function publish(string $version): void
    {
        $this->_exec('git checkout master');
        $this->_exec("git tag $version");
        $this->_exec('git push');
        $this->_exec('git push --tags');
    }

    public function spec(): void
    {
        // Prepare PHP environment
        ini_set('display_errors', '1');
        error_reporting(E_ALL);
        ini_set('log_errors', '0');
        ini_set('assert.exception', '1');
        // Define Mockery global helpers
        Mockery::globalHelpers();
        // Require spec files
        foreach (new DirectoryIterator(__DIR__ . '/spec') as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }
            /** @psalm-suppress UnresolvableInclude */
            require_once $fileInfo->getPathname();
        }
        // Run Mockery expectations
        Mockery::close();
        // Still here?
        echo "All good!\n";
    }
}
