<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\Lap\AvgAltitude;
use FitParser\Records\Generated\Lap\AvgCadence;
use FitParser\Records\Generated\Lap\AvgCadencePosition;
use FitParser\Records\Generated\Lap\AvgCombinedPedalSmoothness;
use FitParser\Records\Generated\Lap\AvgCoreTemperature;
use FitParser\Records\Generated\Lap\AvgDepth;
use FitParser\Records\Generated\Lap\AvgFlow;
use FitParser\Records\Generated\Lap\AvgFractionalCadence;
use FitParser\Records\Generated\Lap\AvgGrade;
use FitParser\Records\Generated\Lap\AvgGrit;
use FitParser\Records\Generated\Lap\AvgHeartRate;
use FitParser\Records\Generated\Lap\AvgLeftPco;
use FitParser\Records\Generated\Lap\AvgLeftPedalSmoothness;
use FitParser\Records\Generated\Lap\AvgLeftPowerPhase;
use FitParser\Records\Generated\Lap\AvgLeftPowerPhasePeak;
use FitParser\Records\Generated\Lap\AvgLeftTorqueEffectiveness;
use FitParser\Records\Generated\Lap\AvgLevMotorPower;
use FitParser\Records\Generated\Lap\AvgNegGrade;
use FitParser\Records\Generated\Lap\AvgNegVerticalSpeed;
use FitParser\Records\Generated\Lap\AvgPosGrade;
use FitParser\Records\Generated\Lap\AvgPosVerticalSpeed;
use FitParser\Records\Generated\Lap\AvgPower;
use FitParser\Records\Generated\Lap\AvgPowerPosition;
use FitParser\Records\Generated\Lap\AvgRespirationRate;
use FitParser\Records\Generated\Lap\AvgRightPco;
use FitParser\Records\Generated\Lap\AvgRightPedalSmoothness;
use FitParser\Records\Generated\Lap\AvgRightPowerPhase;
use FitParser\Records\Generated\Lap\AvgRightPowerPhasePeak;
use FitParser\Records\Generated\Lap\AvgRightTorqueEffectiveness;
use FitParser\Records\Generated\Lap\AvgSaturatedHemoglobinPercent;
use FitParser\Records\Generated\Lap\AvgSpeed;
use FitParser\Records\Generated\Lap\AvgStanceTime;
use FitParser\Records\Generated\Lap\AvgStanceTimeBalance;
use FitParser\Records\Generated\Lap\AvgStanceTimePercent;
use FitParser\Records\Generated\Lap\AvgStepLength;
use FitParser\Records\Generated\Lap\AvgStrokeDistance;
use FitParser\Records\Generated\Lap\AvgTemperature;
use FitParser\Records\Generated\Lap\AvgTotalHemoglobinConc;
use FitParser\Records\Generated\Lap\AvgVam;
use FitParser\Records\Generated\Lap\AvgVerticalOscillation;
use FitParser\Records\Generated\Lap\AvgVerticalRatio;
use FitParser\Records\Generated\Lap\EndPositionLat;
use FitParser\Records\Generated\Lap\EndPositionLong;
use FitParser\Records\Generated\Lap\EnhancedAvgAltitude;
use FitParser\Records\Generated\Lap\EnhancedAvgRespirationRate;
use FitParser\Records\Generated\Lap\EnhancedAvgSpeed;
use FitParser\Records\Generated\Lap\EnhancedMaxAltitude;
use FitParser\Records\Generated\Lap\EnhancedMaxRespirationRate;
use FitParser\Records\Generated\Lap\EnhancedMaxSpeed;
use FitParser\Records\Generated\Lap\EnhancedMinAltitude;
use FitParser\Records\Generated\Lap\Event;
use FitParser\Records\Generated\Lap\EventGroup;
use FitParser\Records\Generated\Lap\EventType;
use FitParser\Records\Generated\Lap\FirstLengthIndex;
use FitParser\Records\Generated\Lap\GpsAccuracy;
use FitParser\Records\Generated\Lap\Intensity;
use FitParser\Records\Generated\Lap\JumpCount;
use FitParser\Records\Generated\Lap\LapTrigger;
use FitParser\Records\Generated\Lap\LeftRightBalance;
use FitParser\Records\Generated\Lap\LevBatteryConsumption;
use FitParser\Records\Generated\Lap\MaxAltitude;
use FitParser\Records\Generated\Lap\MaxCadence;
use FitParser\Records\Generated\Lap\MaxCadencePosition;
use FitParser\Records\Generated\Lap\MaxCoreTemperature;
use FitParser\Records\Generated\Lap\MaxDepth;
use FitParser\Records\Generated\Lap\MaxFractionalCadence;
use FitParser\Records\Generated\Lap\MaxHeartRate;
use FitParser\Records\Generated\Lap\MaxLevMotorPower;
use FitParser\Records\Generated\Lap\MaxNegGrade;
use FitParser\Records\Generated\Lap\MaxNegVerticalSpeed;
use FitParser\Records\Generated\Lap\MaxPosGrade;
use FitParser\Records\Generated\Lap\MaxPosVerticalSpeed;
use FitParser\Records\Generated\Lap\MaxPower;
use FitParser\Records\Generated\Lap\MaxPowerPosition;
use FitParser\Records\Generated\Lap\MaxRespirationRate;
use FitParser\Records\Generated\Lap\MaxSaturatedHemoglobinPercent;
use FitParser\Records\Generated\Lap\MaxSpeed;
use FitParser\Records\Generated\Lap\MaxTemperature;
use FitParser\Records\Generated\Lap\MaxTotalHemoglobinConc;
use FitParser\Records\Generated\Lap\MessageIndex;
use FitParser\Records\Generated\Lap\MinAltitude;
use FitParser\Records\Generated\Lap\MinCoreTemperature;
use FitParser\Records\Generated\Lap\MinHeartRate;
use FitParser\Records\Generated\Lap\MinSaturatedHemoglobinPercent;
use FitParser\Records\Generated\Lap\MinTemperature;
use FitParser\Records\Generated\Lap\MinTotalHemoglobinConc;
use FitParser\Records\Generated\Lap\NormalizedPower;
use FitParser\Records\Generated\Lap\NumActiveLengths;
use FitParser\Records\Generated\Lap\NumLengths;
use FitParser\Records\Generated\Lap\OpponentScore;
use FitParser\Records\Generated\Lap\PlayerScore;
use FitParser\Records\Generated\Lap\RepetitionNum;
use FitParser\Records\Generated\Lap\Sport;
use FitParser\Records\Generated\Lap\StandCount;
use FitParser\Records\Generated\Lap\StartPositionLat;
use FitParser\Records\Generated\Lap\StartPositionLong;
use FitParser\Records\Generated\Lap\StartTime;
use FitParser\Records\Generated\Lap\StrokeCount;
use FitParser\Records\Generated\Lap\SubSport;
use FitParser\Records\Generated\Lap\SwimStroke;
use FitParser\Records\Generated\Lap\TimeInCadenceZone;
use FitParser\Records\Generated\Lap\TimeInHrZone;
use FitParser\Records\Generated\Lap\TimeInPowerZone;
use FitParser\Records\Generated\Lap\TimeInSpeedZone;
use FitParser\Records\Generated\Lap\Timestamp;
use FitParser\Records\Generated\Lap\TimeStanding;
use FitParser\Records\Generated\Lap\TotalAscent;
use FitParser\Records\Generated\Lap\TotalCalories;
use FitParser\Records\Generated\Lap\TotalCycles;
use FitParser\Records\Generated\Lap\TotalDescent;
use FitParser\Records\Generated\Lap\TotalDistance;
use FitParser\Records\Generated\Lap\TotalElapsedTime;
use FitParser\Records\Generated\Lap\TotalFatCalories;
use FitParser\Records\Generated\Lap\TotalFlow;
use FitParser\Records\Generated\Lap\TotalFractionalAscent;
use FitParser\Records\Generated\Lap\TotalFractionalCycles;
use FitParser\Records\Generated\Lap\TotalFractionalDescent;
use FitParser\Records\Generated\Lap\TotalGrit;
use FitParser\Records\Generated\Lap\TotalMovingTime;
use FitParser\Records\Generated\Lap\TotalTimerTime;
use FitParser\Records\Generated\Lap\TotalWork;
use FitParser\Records\Generated\Lap\WktStepIndex;
use FitParser\Records\Generated\Lap\ZoneCount;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class Lap implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            Timestamp::class,
            Event::class,
            EventType::class,
            StartTime::class,
            StartPositionLat::class,
            StartPositionLong::class,
            EndPositionLat::class,
            EndPositionLong::class,
            TotalElapsedTime::class,
            TotalTimerTime::class,
            TotalDistance::class,
            TotalCycles::class,
            TotalCalories::class,
            TotalFatCalories::class,
            AvgSpeed::class,
            MaxSpeed::class,
            AvgHeartRate::class,
            MaxHeartRate::class,
            AvgCadence::class,
            MaxCadence::class,
            AvgPower::class,
            MaxPower::class,
            TotalAscent::class,
            TotalDescent::class,
            Intensity::class,
            LapTrigger::class,
            Sport::class,
            EventGroup::class,
            NumLengths::class,
            NormalizedPower::class,
            LeftRightBalance::class,
            FirstLengthIndex::class,
            AvgStrokeDistance::class,
            SwimStroke::class,
            SubSport::class,
            NumActiveLengths::class,
            TotalWork::class,
            AvgAltitude::class,
            MaxAltitude::class,
            GpsAccuracy::class,
            AvgGrade::class,
            AvgPosGrade::class,
            AvgNegGrade::class,
            MaxPosGrade::class,
            MaxNegGrade::class,
            AvgTemperature::class,
            MaxTemperature::class,
            TotalMovingTime::class,
            AvgPosVerticalSpeed::class,
            AvgNegVerticalSpeed::class,
            MaxPosVerticalSpeed::class,
            MaxNegVerticalSpeed::class,
            TimeInHrZone::class,
            TimeInSpeedZone::class,
            TimeInCadenceZone::class,
            TimeInPowerZone::class,
            RepetitionNum::class,
            MinAltitude::class,
            MinHeartRate::class,
            WktStepIndex::class,
            OpponentScore::class,
            StrokeCount::class,
            ZoneCount::class,
            AvgVerticalOscillation::class,
            AvgStanceTimePercent::class,
            AvgStanceTime::class,
            AvgFractionalCadence::class,
            MaxFractionalCadence::class,
            TotalFractionalCycles::class,
            PlayerScore::class,
            AvgTotalHemoglobinConc::class,
            MinTotalHemoglobinConc::class,
            MaxTotalHemoglobinConc::class,
            AvgSaturatedHemoglobinPercent::class,
            MinSaturatedHemoglobinPercent::class,
            MaxSaturatedHemoglobinPercent::class,
            AvgLeftTorqueEffectiveness::class,
            AvgRightTorqueEffectiveness::class,
            AvgLeftPedalSmoothness::class,
            AvgRightPedalSmoothness::class,
            AvgCombinedPedalSmoothness::class,
            TimeStanding::class,
            StandCount::class,
            AvgLeftPco::class,
            AvgRightPco::class,
            AvgLeftPowerPhase::class,
            AvgLeftPowerPhasePeak::class,
            AvgRightPowerPhase::class,
            AvgRightPowerPhasePeak::class,
            AvgPowerPosition::class,
            MaxPowerPosition::class,
            AvgCadencePosition::class,
            MaxCadencePosition::class,
            EnhancedAvgSpeed::class,
            EnhancedMaxSpeed::class,
            EnhancedAvgAltitude::class,
            EnhancedMinAltitude::class,
            EnhancedMaxAltitude::class,
            AvgLevMotorPower::class,
            MaxLevMotorPower::class,
            LevBatteryConsumption::class,
            AvgVerticalRatio::class,
            AvgStanceTimeBalance::class,
            AvgStepLength::class,
            AvgVam::class,
            AvgDepth::class,
            MaxDepth::class,
            MinTemperature::class,
            EnhancedAvgRespirationRate::class,
            EnhancedMaxRespirationRate::class,
            AvgRespirationRate::class,
            MaxRespirationRate::class,
            TotalGrit::class,
            TotalFlow::class,
            JumpCount::class,
            AvgGrit::class,
            AvgFlow::class,
            TotalFractionalAscent::class,
            TotalFractionalDescent::class,
            AvgCoreTemperature::class,
            MinCoreTemperature::class,
            MaxCoreTemperature::class,
            UnknownValue::class,
        ], true)) {
            throw new \InvalidArgumentException(
                \sprintf('%s is not an expected value for this record.', $value::class)
            );
        }

        $this->values[] = $value;
    }

    /**
     * @return ValueInterface[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}