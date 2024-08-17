<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseTypeEnum;

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

        return reset($values);
    }

    /**
     * @param array<int, null|float|int> $values
     */
    public static function onlyNullValues(mixed $values): bool
    {
        return array_reduce($values, static fn ($state, $value) => null !== $value ? false : $state, true);
    }

    public static function onlyInvalidValues(mixed $rawFieldValue, BaseTypeEnum $baseType): bool
    {
        $invalidValue = BaseTypeEnum::invalidFrom($baseType);

        if (\is_array($rawFieldValue)) {
            return array_reduce($rawFieldValue, static fn ($state, $value) => $value !== $invalidValue ? false : $state, true);
        }

        return $rawFieldValue === $invalidValue;
    }

    public static function convertFITDateTime(int $datetime): \DateTimeImmutable
    {
        $dateTimeImmutable = \DateTimeImmutable::createFromFormat('U', (string) (self::FIT_EPOCH + $datetime));

        if (false === $dateTimeImmutable) {
            throw new \RuntimeException('Failed to convert DateTimeImmutable value');
        }

        return $dateTimeImmutable;
    }
}
