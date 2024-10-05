<?php

declare(strict_types=1);

namespace FitParser\Records;

use FitParser\Enums\BaseType;
use FitParser\Messages\Profile\FieldInterface;
use FitParser\Utils;

final readonly class Field
{
    private function __construct(
        public string $name,
        public null|bool|\DateTimeImmutable|float|int|string $value,
    ) {}

    public static function create(
        string $name,
        null|float|int|string $rawValue,
        ?FieldInterface $field = null,
    ): self {
        return new self(
            $name,
            self::transformValue($rawValue, $field),
        );
    }

    public static function transformValue(
        null|float|int|string $rawValue,
        ?FieldInterface $field
    ): null|bool|\DateTimeImmutable|float|int|string {
        if (null === $field) {
            return $rawValue;
        }

        if ('date_time' === $field->getType()) {
            if (false === \is_int($rawValue)) {
                throw new \RuntimeException('Cannot transform raw value to a date string');
            }

            return Utils::convertFITDateTime($rawValue);
        }

        $baseType = BaseType::fromFieldType($field->getType());

        if ($baseType instanceof BaseType && BaseType::isNumeric($baseType)) {
            return self::applyScaleAndOffset($field, $rawValue);
        }

        return $rawValue;
    }

    private static function applyScaleAndOffset(FieldInterface $field, null|float|int|string $rawValue): float|int
    {
        if (0 === $field->getScale()) {
            return 0;
        }

        if (false === is_numeric($rawValue)) {
            throw new \RuntimeException('Cannot apply scale and offset to a non-numeric value');
        }

        return ($rawValue / $field->getScale()) - $field->getOffset();
    }
}
