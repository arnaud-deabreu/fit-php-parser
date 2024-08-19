<?php

declare(strict_types=1);

namespace FitParser\Messages\Definitions;

final readonly class DeveloperField
{
    private function __construct(
        public int $number,
        public int $size,
        public int $developerDataIndex,
    ) {}

    public static function create(
        int $number,
        int $size,
        int $developerDataIndex,
    ): self {
        return new self(
            $number,
            $size,
            $developerDataIndex,
        );
    }
}
