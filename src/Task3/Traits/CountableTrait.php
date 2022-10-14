<?php

declare(strict_types=1);

namespace App\Task3\Traits;

use count;
use array_reduce;

trait CountableTrait
{
    public function count(): int
    {
        return array_reduce($this->container, function ($count, $item) {
            $count += count($item);

            return $count;
        }, 0);
    }
}