<?php

declare(strict_types=1);

namespace App\Task3\Helper;

use vprintf;
use printf;

class Printer
{
    public static function printInfo(int $point, int $num = 50): void {
        vprintf("%s", [PHP_EOL]);
        vprintf("Punkt %d. %s", [$point, PHP_EOL]);

        for($i = 0; $i < $num; $i++) {
            printf('-');
        }

        vprintf("%s", [PHP_EOL]);
    }

}