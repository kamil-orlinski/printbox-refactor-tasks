<?php

declare(strict_types=1);

namespace App\Task2\Validator;

class VersionValidator implements VersionValidatorInterface
{
    private const VERSION_REGEX = '/^([0-9]+)\.([0-9]+)(\.[0-9]+[ab]?)?$/';

    public function validate(string $version): bool {
        return (bool)preg_match(self::VERSION_REGEX, $version);
    }
}