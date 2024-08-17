<?php

declare(strict_types=1);

namespace FitParser\Messages\Field;

use FitParser\Enums\BaseTypeEnum;

final readonly class FieldDefinition
{
    private function __construct(
        public int $number,
        public int $size,
        public BaseTypeEnum $baseType,
        public float|int $invalidValue,
        public int $baseTypeSize,
    ) {}

    public static function create(
        int $number,
        int $size,
        BaseTypeEnum $baseType,
    ): self {
        return new self(
            $number,
            $size,
            $baseType,
            BaseTypeEnum::invalidFrom($baseType),
            BaseTypeEnum::sizeFrom($baseType)
        );
    }
}
