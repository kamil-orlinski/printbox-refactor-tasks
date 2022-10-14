<?php

declare(strict_types=1);

namespace App\Task1;

$autoloaderFile = dirname(__FILE__) . '/../../vendor/autoload.php';

require_once $autoloaderFile;

$maxNumbers = 100;

(new Printer($maxNumbers))
    ->print(new ModChecker());