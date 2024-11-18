<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseType;
use FitParser\Records\Field;
use FitParser\Records\ValueInterface;
use Symfony\Component\String\UnicodeString;

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
        return array_reduce($values, static fn ($state, $value): bool => null !== $value ? false : $state, true);
    }

    public static function onlyInvalidValues(mixed $rawFieldValue, BaseType $baseType): bool
    {
        $invalidValue = BaseType::invalidFrom($baseType);

        if (\is_array($rawFieldValue)) {
            return array_reduce(
                $rawFieldValue,
                static fn ($state, $value): bool => $value !== $invalidValue ? false : $state,
                true
            );
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

    public static function convertFieldToValueObject(Field $field): ValueInterface
    {
        if (true === str_starts_with($field->name, 'data_')) {
            /**
             * @var class-string $class
             */
            $class = 'FitParser\Records\UnknownValue';
        } else {
            /**
             * @var class-string $class
             */
            $class = (new UnicodeString($field->name))->replace('FitParser\Messages\Profile\Generated\\', 'FitParser\Records\Generated\\')->toString();
        }

        if (false === class_exists($class)) {
            throw new \InvalidArgumentException(\sprintf('%s does not exist', $class));
        }

        $valueObject = $class::create($field->value);

        if ($valueObject instanceof ValueInterface) {
            return $valueObject;
        }

        throw new \InvalidArgumentException(\sprintf('%s does not implement ValueInterface', $class));
    }
}
