<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated\SegmentLeaderboardEntry;

use FitParser\Messages\Profile\FieldInterface;

final readonly class Type implements FieldInterface
{
    /**
     * @param int[] $array
     */
    public function __construct(
        public string $type = 'segment_leaderboard_type',
        public int $def = 1,
        public array $array = [],
        public int $components = 0,
        public int $scale = 1,
        public int $offset = 0,
        public string $units = '',
        public int $bits = 0,
        public bool $accumulate = false,
    ) {
    }

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
