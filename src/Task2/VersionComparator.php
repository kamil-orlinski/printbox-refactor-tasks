<?php

declare(strict_types=1);

namespace App\Task2;

use App\Task2\VersionComparatorInterface;
use App\Task2\Validator\VersionValidatorInterface;
use App\Task2\Exception\InvalidVersionException;

class VersionComparator implements VersionComparatorInterface
{
    private const MAX_VERSION_NUMBERS = 3;

    private const VERSION_SUFFIXES = ['a', 'b'];

    private const SAME_VERSION_RETURN_VALUE = 0;

    public function __construct(private readonly VersionValidatorInterface $validator) {

    }

    public function compare(string $version1, string $version2): int {
        $validationSuccessful = ($this->validator->validate($version1) && $this->validator->validate($version2));
        if (!$validationSuccessful) {
            throw new InvalidVersionException();
        }

        $version1Pieces = explode('.', $version1);
        $version2Pieces = explode('.', $version2);

        $this->arrayPad($version1Pieces);
        $this->arrayPad($version2Pieces);

        for ($i = 0; $i < self::MAX_VERSION_NUMBERS; $i++) {
            $result = $this->check($version1Pieces[$i], $version2Pieces[$i]);

            if ($result === 0) { continue; }

            return $result;
        }

        return self::SAME_VERSION_RETURN_VALUE;

    }

    private function check(string $version1, string $version2): int {
        $version1Value = $this->normalize($version1);
        $version2Value = $this->normalize($version2);

        return -1 * ($version1Value <=> $version2Value);
    }

    private function normalize(string $item): float {
        if (!in_array($item[-1], self::VERSION_SUFFIXES)) {
            return floatval(vsprintf('%s.3', [$item]));
        }

        $lastChar = $item[-1];
        $chars = str_split($item);
        $lastCharValue = implode('', array_slice($chars, 0, -1));

        switch ($lastChar) {
            case 'a': {
                $lastCharValue .= '.1';
            } break;
            case 'b': {
                $lastCharValue .= '.2';
            } break;
        }

        return floatval($lastCharValue);
    }

    private function arrayPad(array &$items): void {
        $items = array_pad($items, self::MAX_VERSION_NUMBERS, '0');
    }

}