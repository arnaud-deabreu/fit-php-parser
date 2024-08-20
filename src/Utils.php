<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseType;

final readonly class Utils
{
    private const int FIT_EPOCH = 631072771;

    /**
     * @param array<int, null|float|int> $values
     */
    public static function sanitizeValues(array $values): null|float|int
    {
        if (true === self::onlyNullValues($values) || [] === $values) {
            return null;
        }

        $values = array_filter($values, static fn ($value) => null !== $value);

        $sanitizedVaue = reset($values);

        if (false === $sanitizedVaue) {
            return null;
        }

        return $sanitizedVaue;
    }

    /**
     * @param array<int, null|float|int> $values
     */
    public static function onlyNullValues(mixed $values): bool
    {
        return array_reduce($values, static fn ($state, $value) => null !== $value ? false : $state, true);
    }

    public static function onlyInvalidValues(mixed $rawFieldValue, BaseType $baseType): bool
    {
        $invalidValue = BaseType::invalidFrom($baseType);

        if (\is_array($rawFieldValue)) {
            return array_reduce($rawFieldValue, static fn ($state, $value) => $value !== $invalidValue ? false : $state, true);
        }

        return $rawFieldValue === $invalidValue;
    }

    public static function convertFITDateTime(int $datetime): \DateTimeImmutable
    {
        $dateTimeImmutable = \DateTimeImmutable::createFromFormat('U', (string) (self::FIT_EPOCH + $datetime));

        if (false === $dateTimeImmutable || $datetime < 0) {
            throw new \RuntimeException('Failed to convert DateTimeImmutable value');
        }

        return $dateTimeImmutable;
    }
}
