<?php

namespace App\Task3;

use vprintf;

class QueeObject
{
    public function __construct(private readonly string $name, private readonly int $priority) {

    }

    public function getName(): string {

    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function __call(string $name, array $arguments)
    {
        vprintf("Calling method %s%s", [$name, PHP_EOL]);
    }

}