<?php

declare(strict_types=1);

namespace App\Task1;

interface ModCheckerInterface
{
    public function match(int $number): int|string;
}