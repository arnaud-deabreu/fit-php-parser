<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated\SegmentLap;

use FitParser\Messages\Profile\FieldInterface;

final readonly class EventGroup implements FieldInterface
{
    /**
     * @param int[] $array
     */
    public function __construct(
        public string $type = 'uint8',
        public int $def = 24,
        public array $array = [],
        public int $components = 0,
        public int $scale = 1,
        public int $offset = 0,
        public string $units = '',
        public int $bits = 0,
        public bool $accumulate = false,
    ) {}

    public function getDefinitionNumber(): int
    {
        return $this->def;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getScale(): int
    {
        return $this->scale;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
