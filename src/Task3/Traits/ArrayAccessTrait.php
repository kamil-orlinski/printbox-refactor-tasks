<?php

namespace App\Task3\Traits;

trait ArrayAccessTrait
{
    public function offsetSet($offset, $value)
    {
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        if (!isset($this->container[$offset])) {
            return;
        }

        unset($this->container[$offset]);

    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}