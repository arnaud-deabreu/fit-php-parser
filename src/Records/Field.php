<?php

declare(strict_types=1);

namespace FitParser\Records;

use FitParser\Enums\BaseType;
use FitParser\Messages\Profile\Field as ProfileField;
use FitParser\Utils;

final class Field
{
    private function __construct(
        public readonly string $name,
        public null|\DateTimeImmutable|float|int|string $value,
    ) {}

    public static function create(
        string $name,
        null|float|int|string $rawValue,
        ?ProfileField $field = null,
    ): self {
        return new self(
            $name,
            self::transformValue($rawValue, $field),
        );
    }

    public static function transformValue(
        null|float|int|string $rawValue,
        ?ProfileField $field
    ): null|\DateTimeImmutable|float|int|string {
        if (null === $field) {
            return $rawValue;
        }

        if ('date_time' === $field->type) {
            if (false === \is_int($rawValue)) {
                throw new \RuntimeException('Cannot transform raw value to a date string');
            }

            return Utils::convertFITDateTime($rawValue);
        }

        $baseType = BaseType::fromFieldType($field->type);

        if ($baseType instanceof BaseType && BaseType::isNumeric($baseType)) {
            return self::applyScaleAndOffset($field, $rawValue);
        }

        return $rawValue;
    }

    private static function applyScaleAndOffset(ProfileField $field, null|float|int|string $rawValue): float|int
    {
        if (0 === $field->scale) {
            return 0;
        }

        if (false === is_numeric($rawValue)) {
            throw new \RuntimeException('Cannot apply scale and offset to a non-numeric value');
        }

        return ($rawValue / $field->scale) - $field->offset;
    }
}
