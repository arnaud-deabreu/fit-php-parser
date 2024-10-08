<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\SegmentLap\ActiveTime;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgCadence;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgCadencePosition;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgCombinedPedalSmoothness;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgFlow;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgFractionalCadence;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgGrade;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgGrit;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgHeartRate;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgLeftPco;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgLeftPedalSmoothness;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgLeftPowerPhase;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgLeftPowerPhasePeak;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgLeftTorqueEffectiveness;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgNegGrade;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgNegVerticalSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgPosGrade;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgPosVerticalSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgPower;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgPowerPosition;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgRightPco;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgRightPedalSmoothness;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgRightPowerPhase;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgRightPowerPhasePeak;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgRightTorqueEffectiveness;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\AvgTemperature;
use FitParser\Messages\Profile\Generated\SegmentLap\EndPositionLat;
use FitParser\Messages\Profile\Generated\SegmentLap\EndPositionLong;
use FitParser\Messages\Profile\Generated\SegmentLap\EnhancedAvgAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\EnhancedMaxAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\EnhancedMinAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\Event;
use FitParser\Messages\Profile\Generated\SegmentLap\EventGroup;
use FitParser\Messages\Profile\Generated\SegmentLap\EventType;
use FitParser\Messages\Profile\Generated\SegmentLap\FrontGearShiftCount;
use FitParser\Messages\Profile\Generated\SegmentLap\GpsAccuracy;
use FitParser\Messages\Profile\Generated\SegmentLap\LeftRightBalance;
use FitParser\Messages\Profile\Generated\SegmentLap\Manufacturer;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxCadence;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxCadencePosition;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxFractionalCadence;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxHeartRate;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxNegGrade;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxNegVerticalSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxPosGrade;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxPosVerticalSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxPower;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxPowerPosition;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxSpeed;
use FitParser\Messages\Profile\Generated\SegmentLap\MaxTemperature;
use FitParser\Messages\Profile\Generated\SegmentLap\MessageIndex;
use FitParser\Messages\Profile\Generated\SegmentLap\MinAltitude;
use FitParser\Messages\Profile\Generated\SegmentLap\MinHeartRate;
use FitParser\Messages\Profile\Generated\SegmentLap\Name;
use FitParser\Messages\Profile\Generated\SegmentLap\NecLat;
use FitParser\Messages\Profile\Generated\SegmentLap\NecLong;
use FitParser\Messages\Profile\Generated\SegmentLap\NormalizedPower;
use FitParser\Messages\Profile\Generated\SegmentLap\RearGearShiftCount;
use FitParser\Messages\Profile\Generated\SegmentLap\RepetitionNum;
use FitParser\Messages\Profile\Generated\SegmentLap\Sport;
use FitParser\Messages\Profile\Generated\SegmentLap\SportEvent;
use FitParser\Messages\Profile\Generated\SegmentLap\StandCount;
use FitParser\Messages\Profile\Generated\SegmentLap\StartPositionLat;
use FitParser\Messages\Profile\Generated\SegmentLap\StartPositionLong;
use FitParser\Messages\Profile\Generated\SegmentLap\StartTime;
use FitParser\Messages\Profile\Generated\SegmentLap\Status;
use FitParser\Messages\Profile\Generated\SegmentLap\SubSport;
use FitParser\Messages\Profile\Generated\SegmentLap\SwcLat;
use FitParser\Messages\Profile\Generated\SegmentLap\SwcLong;
use FitParser\Messages\Profile\Generated\SegmentLap\TimeInCadenceZone;
use FitParser\Messages\Profile\Generated\SegmentLap\TimeInHrZone;
use FitParser\Messages\Profile\Generated\SegmentLap\TimeInPowerZone;
use FitParser\Messages\Profile\Generated\SegmentLap\TimeInSpeedZone;
use FitParser\Messages\Profile\Generated\SegmentLap\Timestamp;
use FitParser\Messages\Profile\Generated\SegmentLap\TimeStanding;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalAscent;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalCalories;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalCycles;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalDescent;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalDistance;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalElapsedTime;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalFatCalories;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalFlow;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalFractionalAscent;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalFractionalCycles;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalFractionalDescent;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalGrit;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalMovingTime;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalTimerTime;
use FitParser\Messages\Profile\Generated\SegmentLap\TotalWork;
use FitParser\Messages\Profile\Generated\SegmentLap\Uuid;
use FitParser\Messages\Profile\Generated\SegmentLap\WktStepIndex;
use FitParser\Messages\Profile\MessageInterface;

final readonly class SegmentLap implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Timestamp $timestamp,
        public Event $event,
        public EventType $eventType,
        public StartTime $startTime,
        public StartPositionLat $startPositionLat,
        public StartPositionLong $startPositionLong,
        public EndPositionLat $endPositionLat,
        public EndPositionLong $endPositionLong,
        public TotalElapsedTime $totalElapsedTime,
        public TotalTimerTime $totalTimerTime,
        public TotalDistance $totalDistance,
        public TotalCycles $totalCycles,
        public TotalCalories $totalCalories,
        public TotalFatCalories $totalFatCalories,
        public AvgSpeed $avgSpeed,
        public MaxSpeed $maxSpeed,
        public AvgHeartRate $avgHeartRate,
        public MaxHeartRate $maxHeartRate,
        public AvgCadence $avgCadence,
        public MaxCadence $maxCadence,
        public AvgPower $avgPower,
        public MaxPower $maxPower,
        public TotalAscent $totalAscent,
        public TotalDescent $totalDescent,
        public Sport $sport,
        public EventGroup $eventGroup,
        public NecLat $necLat,
        public NecLong $necLong,
        public SwcLat $swcLat,
        public SwcLong $swcLong,
        public Name $name,
        public NormalizedPower $normalizedPower,
        public LeftRightBalance $leftRightBalance,
        public SubSport $subSport,
        public TotalWork $totalWork,
        public AvgAltitude $avgAltitude,
        public MaxAltitude $maxAltitude,
        public GpsAccuracy $gpsAccuracy,
        public AvgGrade $avgGrade,
        public AvgPosGrade $avgPosGrade,
        public AvgNegGrade $avgNegGrade,
        public MaxPosGrade $maxPosGrade,
        public MaxNegGrade $maxNegGrade,
        public AvgTemperature $avgTemperature,
        public MaxTemperature $maxTemperature,
        public TotalMovingTime $totalMovingTime,
        public AvgPosVerticalSpeed $avgPosVerticalSpeed,
        public AvgNegVerticalSpeed $avgNegVerticalSpeed,
        public MaxPosVerticalSpeed $maxPosVerticalSpeed,
        public MaxNegVerticalSpeed $maxNegVerticalSpeed,
        public TimeInHrZone $timeInHrZone,
        public TimeInSpeedZone $timeInSpeedZone,
        public TimeInCadenceZone $timeInCadenceZone,
        public TimeInPowerZone $timeInPowerZone,
        public RepetitionNum $repetitionNum,
        public MinAltitude $minAltitude,
        public MinHeartRate $minHeartRate,
        public ActiveTime $activeTime,
        public WktStepIndex $wktStepIndex,
        public SportEvent $sportEvent,
        public AvgLeftTorqueEffectiveness $avgLeftTorqueEffectiveness,
        public AvgRightTorqueEffectiveness $avgRightTorqueEffectiveness,
        public AvgLeftPedalSmoothness $avgLeftPedalSmoothness,
        public AvgRightPedalSmoothness $avgRightPedalSmoothness,
        public AvgCombinedPedalSmoothness $avgCombinedPedalSmoothness,
        public Status $status,
        public Uuid $uuid,
        public AvgFractionalCadence $avgFractionalCadence,
        public MaxFractionalCadence $maxFractionalCadence,
        public TotalFractionalCycles $totalFractionalCycles,
        public FrontGearShiftCount $frontGearShiftCount,
        public RearGearShiftCount $rearGearShiftCount,
        public TimeStanding $timeStanding,
        public StandCount $standCount,
        public AvgLeftPco $avgLeftPco,
        public AvgRightPco $avgRightPco,
        public AvgLeftPowerPhase $avgLeftPowerPhase,
        public AvgLeftPowerPhasePeak $avgLeftPowerPhasePeak,
        public AvgRightPowerPhase $avgRightPowerPhase,
        public AvgRightPowerPhasePeak $avgRightPowerPhasePeak,
        public AvgPowerPosition $avgPowerPosition,
        public MaxPowerPosition $maxPowerPosition,
        public AvgCadencePosition $avgCadencePosition,
        public MaxCadencePosition $maxCadencePosition,
        public Manufacturer $manufacturer,
        public TotalGrit $totalGrit,
        public TotalFlow $totalFlow,
        public AvgGrit $avgGrit,
        public AvgFlow $avgFlow,
        public TotalFractionalAscent $totalFractionalAscent,
        public TotalFractionalDescent $totalFractionalDescent,
        public EnhancedAvgAltitude $enhancedAvgAltitude,
        public EnhancedMaxAltitude $enhancedMaxAltitude,
        public EnhancedMinAltitude $enhancedMinAltitude,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Timestamp(),
            new Event(),
            new EventType(),
            new StartTime(),
            new StartPositionLat(),
            new StartPositionLong(),
            new EndPositionLat(),
            new EndPositionLong(),
            new TotalElapsedTime(),
            new TotalTimerTime(),
            new TotalDistance(),
            new TotalCycles(),
            new TotalCalories(),
            new TotalFatCalories(),
            new AvgSpeed(),
            new MaxSpeed(),
            new AvgHeartRate(),
            new MaxHeartRate(),
            new AvgCadence(),
            new MaxCadence(),
            new AvgPower(),
            new MaxPower(),
            new TotalAscent(),
            new TotalDescent(),
            new Sport(),
            new EventGroup(),
            new NecLat(),
            new NecLong(),
            new SwcLat(),
            new SwcLong(),
            new Name(),
            new NormalizedPower(),
            new LeftRightBalance(),
            new SubSport(),
            new TotalWork(),
            new AvgAltitude(),
            new MaxAltitude(),
            new GpsAccuracy(),
            new AvgGrade(),
            new AvgPosGrade(),
            new AvgNegGrade(),
            new MaxPosGrade(),
            new MaxNegGrade(),
            new AvgTemperature(),
            new MaxTemperature(),
            new TotalMovingTime(),
            new AvgPosVerticalSpeed(),
            new AvgNegVerticalSpeed(),
            new MaxPosVerticalSpeed(),
            new MaxNegVerticalSpeed(),
            new TimeInHrZone(),
            new TimeInSpeedZone(),
            new TimeInCadenceZone(),
            new TimeInPowerZone(),
            new RepetitionNum(),
            new MinAltitude(),
            new MinHeartRate(),
            new ActiveTime(),
            new WktStepIndex(),
            new SportEvent(),
            new AvgLeftTorqueEffectiveness(),
            new AvgRightTorqueEffectiveness(),
            new AvgLeftPedalSmoothness(),
            new AvgRightPedalSmoothness(),
            new AvgCombinedPedalSmoothness(),
            new Status(),
            new Uuid(),
            new AvgFractionalCadence(),
            new MaxFractionalCadence(),
            new TotalFractionalCycles(),
            new FrontGearShiftCount(),
            new RearGearShiftCount(),
            new TimeStanding(),
            new StandCount(),
            new AvgLeftPco(),
            new AvgRightPco(),
            new AvgLeftPowerPhase(),
            new AvgLeftPowerPhasePeak(),
            new AvgRightPowerPhase(),
            new AvgRightPowerPhasePeak(),
            new AvgPowerPosition(),
            new MaxPowerPosition(),
            new AvgCadencePosition(),
            new MaxCadencePosition(),
            new Manufacturer(),
            new TotalGrit(),
            new TotalFlow(),
            new AvgGrit(),
            new AvgFlow(),
            new TotalFractionalAscent(),
            new TotalFractionalDescent(),
            new EnhancedAvgAltitude(),
            new EnhancedMaxAltitude(),
            new EnhancedMinAltitude(),
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
