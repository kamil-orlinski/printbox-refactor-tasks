<?php

declare(strict_types=1);

namespace App\Task2\Validator;

interface VersionValidatorInterface
{
    public function validate(string $version): bool;
}