<?php

namespace App\Task3\Traits;

use array_key_last;

trait IteratorTrait
{
    public function current(): mixed
    {
        return $this->container[$this->currentIndex];

    }

    public function key(): mixed
    {
        return $this->currentIndex;
    }

    public function next(): void
    {
        $this->currentIndex--;
        $nextIndexCondition = !isset($this->container[$this->currentIndex]);

        while ($nextIndexCondition) {
            $this->currentIndex--;

            if ($this->currentIndex < self::MIN_PRIORITY) {
                break;
            }
        }
    }

    public function rewind(): void
    {
        $this->currentIndex = array_key_last($this->container);
    }

    public function valid(): bool
    {
        return isset($this->container[$this->currentIndex]);
    }

}