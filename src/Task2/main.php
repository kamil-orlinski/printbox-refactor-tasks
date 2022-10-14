<?php

declare(strict_types=1);

namespace App\Task2;

use App\Task2\Validator\VersionValidator;

$autoloaderFile = dirname(__FILE__) . '/../../vendor/autoload.php';

require_once $autoloaderFile;

$versions = [
    ['1.0.0', '1.0.1'],
    ['1.1', '1.0.1'],
    ['1.0.0', '1.0'],
    ['1.0.1', '1.0.1a'],
    ['9.0.0', '10.0.0'],
    ['1.0.1a', '1.0.1b']
];

$comparator = new VersionComparator(new VersionValidator());

foreach ($versions as [$version1, $version2]) {

    try {
        $result = $comparator->compare($version1, $version2);

        vprintf("Wynik porównania wersji '%s' i '%s' => %d%s", [$version1, $version2, $result, PHP_EOL]);
    } catch(\InvalidArgumentException $ex) {
        vprintf("%s%s", [$ex->getMessage(), PHP_EOL]);
    }
}