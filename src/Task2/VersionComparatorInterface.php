<?php

declare(strict_types=1);

namespace App\Task2;

interface VersionComparatorInterface
{
    public function compare(string $version1, string $version2): int;

}