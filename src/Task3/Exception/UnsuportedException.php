<?php

namespace App\Task3\Exception;

class UnsuportedException extends \Exception
{
    private const MESSAGE = 'Unsuported';

    public function __construct($message = self::MESSAGE, $code = 0, $previous = null ) {
        parent::__construct($message, $code, $previous);
    }

}