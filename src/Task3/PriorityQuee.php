<?php

namespace App\Task3;

use App\Task3\Exception\InvalidPriorityException;
use App\Task3\Exception\UnsuportedException;
use App\Task3\Traits\ArrayAccessTrait;
use App\Task3\Traits\CountableTrait;
use App\Task3\Traits\IteratorTrait;
use array_key_last;
use array_map;

class PriorityQuee implements \Countable, \Iterator, \ArrayAccess
{
    use CountableTrait, IteratorTrait, ArrayAccessTrait;

    private const MAX_PRIORITY = 10;

    private const MIN_PRIORITY = 0;

    private int $currentIndex = 0;

    private ?array $container = null;

    public function __construct()
    {
        $this->container = [];
    }

    public function enquee(QueeObject $queeObject)
    {
        $priority = $queeObject->getPriority();

        if ($priority > self::MAX_PRIORITY || $priority < self::MIN_PRIORITY) {
            throw new InvalidPriorityException();
        }

        if (!array_key_exists($priority, $this->container)) {
            $this->container[$priority] = [];
            ksort($this->container);
        }

        $this->container[$priority][] = $queeObject;
        $this->currentIndex = array_key_last($this->container);
    }

    public function asArray(): array
    {
        return (array)$this->container;
    }

    public function __set(string $name, $value): void
    {
        throw new UnsuportedException();
    }

    public function __call(string $name, array $arguments)
    {
        foreach ($this->container as $items) {
            array_map(function ($item) use ($name) {
                $item->$name();
            }, $items);
        }
    }

    public function __serialize(): array
    {
        return [
            'container' => $this->container
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->container = $data['container'];
    }

}