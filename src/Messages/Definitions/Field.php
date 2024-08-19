<?php

declare(strict_types=1);

namespace FitParser\Messages\Definitions;

use FitParser\Enums\BaseType;

final readonly class Field
{
    private function __construct(
        public int $number,
        public int $size,
        public BaseType $baseType,
        public float|int $invalidValue,
        public int $baseTypeSize,
    ) {}

    public static function create(
        int $number,
        int $size,
        BaseType $baseType,
    ): self {
        return new self(
            $number,
            $size,
            $baseType,
            BaseType::invalidFrom($baseType),
            BaseType::sizeFrom($baseType)
        );
    }
}
