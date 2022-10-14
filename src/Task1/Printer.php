<?php

declare(strict_types =1);

namespace App\Task1;

class Printer {

    public function __construct(private readonly int $numbersCount)
    {

    }

    private function getNumberCount(): int {
        return $this->numbersCount;
    }

    public function print(ModCheckerInterface $modChecker): void
    {
        $numbersCount = $this->getNumberCount();

        for ($i = 1; $i <= $numbersCount; $i++) {
            $result = $modChecker->match($i);

            vprintf("%s\n", [$result]);
        }
    }
}