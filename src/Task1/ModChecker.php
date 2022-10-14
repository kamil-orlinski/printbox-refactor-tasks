<?php

declare(strict_types=1);

namespace App\Task1;

class ModChecker implements ModCheckerInterface
{
    private const LITERALS = [
        'modBy3' => 'Tom',
        'modBy5' => 'Ula',
        'modBy3And5' => 'TomUla'
    ];

    public function match(int $number): int|string {
        return match(true) {
            0 === ($number % 3) && 0 === ($number % 5) => self::LITERALS['modBy3And5'],
            0 === ($number % 3)     => self::LITERALS['modBy3'],
            0 === ($number % 5)     => self::LITERALS['modBy5'],
            default => $number
        };
    }
}