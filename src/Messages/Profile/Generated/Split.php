<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Split\AvgSpeed;
use FitParser\Messages\Profile\Generated\Split\AvgVertSpeed;
use FitParser\Messages\Profile\Generated\Split\EndPositionLat;
use FitParser\Messages\Profile\Generated\Split\EndPositionLong;
use FitParser\Messages\Profile\Generated\Split\EndTime;
use FitParser\Messages\Profile\Generated\Split\MaxSpeed;
use FitParser\Messages\Profile\Generated\Split\MessageIndex;
use FitParser\Messages\Profile\Generated\Split\SplitType;
use FitParser\Messages\Profile\Generated\Split\StartElevation;
use FitParser\Messages\Profile\Generated\Split\StartPositionLat;
use FitParser\Messages\Profile\Generated\Split\StartPositionLong;
use FitParser\Messages\Profile\Generated\Split\StartTime;
use FitParser\Messages\Profile\Generated\Split\TotalAscent;
use FitParser\Messages\Profile\Generated\Split\TotalCalories;
use FitParser\Messages\Profile\Generated\Split\TotalDescent;
use FitParser\Messages\Profile\Generated\Split\TotalDistance;
use FitParser\Messages\Profile\Generated\Split\TotalElapsedTime;
use FitParser\Messages\Profile\Generated\Split\TotalMovingTime;
use FitParser\Messages\Profile\Generated\Split\TotalTimerTime;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Split implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public SplitType $splitType,
        public TotalElapsedTime $totalElapsedTime,
        public TotalTimerTime $totalTimerTime,
        public TotalDistance $totalDistance,
        public AvgSpeed $avgSpeed,
        public StartTime $startTime,
        public TotalAscent $totalAscent,
        public TotalDescent $totalDescent,
        public StartPositionLat $startPositionLat,
        public StartPositionLong $startPositionLong,
        public EndPositionLat $endPositionLat,
        public EndPositionLong $endPositionLong,
        public MaxSpeed $maxSpeed,
        public AvgVertSpeed $avgVertSpeed,
        public EndTime $endTime,
        public TotalCalories $totalCalories,
        public StartElevation $startElevation,
        public TotalMovingTime $totalMovingTime,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new SplitType(),
            new TotalElapsedTime(),
            new TotalTimerTime(),
            new TotalDistance(),
            new AvgSpeed(),
            new StartTime(),
            new TotalAscent(),
            new TotalDescent(),
            new StartPositionLat(),
            new StartPositionLong(),
            new EndPositionLat(),
            new EndPositionLong(),
            new MaxSpeed(),
            new AvgVertSpeed(),
            new EndTime(),
            new TotalCalories(),
            new StartElevation(),
            new TotalMovingTime(),
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
