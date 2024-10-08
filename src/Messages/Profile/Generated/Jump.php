<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Jump\Distance;
use FitParser\Messages\Profile\Generated\Jump\EnhancedSpeed;
use FitParser\Messages\Profile\Generated\Jump\HangTime;
use FitParser\Messages\Profile\Generated\Jump\Height;
use FitParser\Messages\Profile\Generated\Jump\PositionLat;
use FitParser\Messages\Profile\Generated\Jump\PositionLong;
use FitParser\Messages\Profile\Generated\Jump\Rotations;
use FitParser\Messages\Profile\Generated\Jump\Score;
use FitParser\Messages\Profile\Generated\Jump\Speed;
use FitParser\Messages\Profile\Generated\Jump\Timestamp;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Jump implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public Distance $distance,
        public Height $height,
        public Rotations $rotations,
        public HangTime $hangTime,
        public Score $score,
        public PositionLat $positionLat,
        public PositionLong $positionLong,
        public Speed $speed,
        public EnhancedSpeed $enhancedSpeed,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new Distance(),
            new Height(),
            new Rotations(),
            new HangTime(),
            new Score(),
            new PositionLat(),
            new PositionLong(),
            new Speed(),
            new EnhancedSpeed(),
        );
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields(): iterable
    {
        /** @var FieldInterface[] $properties */
        $properties = get_object_vars($this);

        foreach ($properties as $field) {
            yield $field->getDefinitionNumber() => $field;
        }
    }
}
