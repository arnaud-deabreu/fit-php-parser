<?php

declare(strict_types=1);

namespace FitParser\Messages\Field;

use FitParser\Enums\BaseTypeEnum;
use FitParser\Messages\Profile\Field as ProfileField;
use FitParser\Utils;

final class Field
{
    private function __construct(
        public readonly string $name,
        public readonly FieldDefinition $fieldDefinition,
        public readonly null|float|int|string $rawValue,
        public readonly ?ProfileField $field,
        public null|\DateTimeImmutable|float|int|string $value,
    ) {}

    public static function create(
        string $name,
        FieldDefinition $fieldDefinition,
        null|float|int|string $rawValue,
        ?ProfileField $field = null,
    ): self {
        return new self(
            $name,
            $fieldDefinition,
            $rawValue,
            $field,
            null
        );
    }

    public function transformValue(): void
    {
        if ('date_time' === $this->field?->type) {
            if (false === \is_int($this->rawValue)) {
                throw new \RuntimeException('Cannot transform raw value to a date string');
            }

            $this->value = Utils::convertFITDateTime($this->rawValue);

            return;
        }

        $baseType = BaseTypeEnum::fromFieldType($this->field?->type);

        if ($baseType instanceof BaseTypeEnum && BaseTypeEnum::isNumeric($baseType)) {
            $this->applyScaleAndOffset();

            return;
        }

        $this->value = $this->rawValue;
    }

    private function applyScaleAndOffset(): void
    {
        if (null === $this->field || 0 === $this->field->scale) {
            $this->value = 0;

            return;
        }

        if (false === is_numeric($this->rawValue)) {
            throw new \RuntimeException('Cannot apply scale and offset to a non-numeric value');
        }

        $this->value = ($this->rawValue / $this->field->scale) - $this->field->offset;
    }
}
