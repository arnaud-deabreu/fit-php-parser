<?php

declare(strict_types=1);

namespace FitParser\Messages\Field;

final readonly class DeveloperFieldDefinition
{
    private function __construct(
        public int $fieldDefinitionNumber,
        public int $size,
        public int $developerDataIndex,
    ) {}

    public static function create(
        int $fieldDefinitionNumber,
        int $size,
        int $developerDataIndex,
    ): self {
        return new self(
            $fieldDefinitionNumber,
            $size,
            $developerDataIndex,
        );
    }
}
