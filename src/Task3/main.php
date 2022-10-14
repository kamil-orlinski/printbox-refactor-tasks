<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task3\Helper\Printer;
use print_r;
use vprintf;


$autoloaderFile = dirname(__FILE__) . '/../../vendor/autoload.php';

require_once $autoloaderFile;


$queeObjects = [
    new QueeObject('First-object', 1),
    new QueeObject('Second-object', 1),
    new QueeObject('Third-object', 1),
    new QueeObject('Fourth-object', 1),
    new QueeObject('Fifth-object', 1),
    new QueeObject('Fifth-2-object', 2),
    new QueeObject('Fifth-2-object', 3),
];

$priorityQuee = new PriorityQuee();

// Punkt 1
foreach ($queeObjects as $object) {
   $priorityQuee->enquee($object);
}

// Punkt 2

Printer::printInfo(2);
foreach ($priorityQuee as $quee) {
    print_r($quee);
}

// Punkt 3

Printer::printInfo(3);
vprintf("Priority quee items count %d%s", [count($priorityQuee), PHP_EOL]);

// Punkt 5
$serializedPriorityQuee = serialize($priorityQuee);

$unserializedPriorityQuee = unserialize($serializedPriorityQuee);


// Punkt 6

Printer::printInfo(6);
print_r($priorityQuee[1]);

// Punkt 7
Printer::printInfo(7);
$index = 1;
unset($priorityQuee[$index]);
vprintf('Empty priority quee at index %d', [$index, PHP_EOL]);

// Punkt 8
Printer::printInfo(8);
try {
    $priorityQuee->test = 100;
} catch(\Exception $ex) {
    vprintf("%s%s", [$ex->getMessage(), PHP_EOL]);
}

// Punkt 9
Printer::printInfo(9);
$priorityQuee->undefinedMethod();