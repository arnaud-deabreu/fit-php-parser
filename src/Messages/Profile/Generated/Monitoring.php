<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Monitoring\ActiveCalories;
use FitParser\Messages\Profile\Generated\Monitoring\ActiveTime;
use FitParser\Messages\Profile\Generated\Monitoring\ActiveTime16;
use FitParser\Messages\Profile\Generated\Monitoring\ActivityLevel;
use FitParser\Messages\Profile\Generated\Monitoring\ActivitySubtype;
use FitParser\Messages\Profile\Generated\Monitoring\ActivityTime;
use FitParser\Messages\Profile\Generated\Monitoring\ActivityType;
use FitParser\Messages\Profile\Generated\Monitoring\Ascent;
use FitParser\Messages\Profile\Generated\Monitoring\Calories;
use FitParser\Messages\Profile\Generated\Monitoring\CurrentActivityTypeIntensity;
use FitParser\Messages\Profile\Generated\Monitoring\Cycles;
use FitParser\Messages\Profile\Generated\Monitoring\Cycles16;
use FitParser\Messages\Profile\Generated\Monitoring\Descent;
use FitParser\Messages\Profile\Generated\Monitoring\DeviceIndex;
use FitParser\Messages\Profile\Generated\Monitoring\Distance;
use FitParser\Messages\Profile\Generated\Monitoring\Distance16;
use FitParser\Messages\Profile\Generated\Monitoring\Duration;
use FitParser\Messages\Profile\Generated\Monitoring\DurationMin;
use FitParser\Messages\Profile\Generated\Monitoring\HeartRate;
use FitParser\Messages\Profile\Generated\Monitoring\Intensity;
use FitParser\Messages\Profile\Generated\Monitoring\LocalTimestamp;
use FitParser\Messages\Profile\Generated\Monitoring\ModerateActivityMinutes;
use FitParser\Messages\Profile\Generated\Monitoring\Temperature;
use FitParser\Messages\Profile\Generated\Monitoring\TemperatureMax;
use FitParser\Messages\Profile\Generated\Monitoring\TemperatureMin;
use FitParser\Messages\Profile\Generated\Monitoring\Timestamp;
use FitParser\Messages\Profile\Generated\Monitoring\Timestamp16;
use FitParser\Messages\Profile\Generated\Monitoring\TimestampMin8;
use FitParser\Messages\Profile\Generated\Monitoring\VigorousActivityMinutes;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Monitoring implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public DeviceIndex $deviceIndex,
        public Calories $calories,
        public Distance $distance,
        public Cycles $cycles,
        public ActiveTime $activeTime,
        public ActivityType $activityType,
        public ActivitySubtype $activitySubtype,
        public ActivityLevel $activityLevel,
        public Distance16 $distance16,
        public Cycles16 $cycles16,
        public ActiveTime16 $activeTime16,
        public LocalTimestamp $localTimestamp,
        public Temperature $temperature,
        public TemperatureMin $temperatureMin,
        public TemperatureMax $temperatureMax,
        public ActivityTime $activityTime,
        public ActiveCalories $activeCalories,
        public CurrentActivityTypeIntensity $currentActivityTypeIntensity,
        public TimestampMin8 $timestampMin8,
        public Timestamp16 $timestamp16,
        public HeartRate $heartRate,
        public Intensity $intensity,
        public DurationMin $durationMin,
        public Duration $duration,
        public Ascent $ascent,
        public Descent $descent,
        public ModerateActivityMinutes $moderateActivityMinutes,
        public VigorousActivityMinutes $vigorousActivityMinutes,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new DeviceIndex(),
            new Calories(),
            new Distance(),
            new Cycles(),
            new ActiveTime(),
            new ActivityType(),
            new ActivitySubtype(),
            new ActivityLevel(),
            new Distance16(),
            new Cycles16(),
            new ActiveTime16(),
            new LocalTimestamp(),
            new Temperature(),
            new TemperatureMin(),
            new TemperatureMax(),
            new ActivityTime(),
            new ActiveCalories(),
            new CurrentActivityTypeIntensity(),
            new TimestampMin8(),
            new Timestamp16(),
            new HeartRate(),
            new Intensity(),
            new DurationMin(),
            new Duration(),
            new Ascent(),
            new Descent(),
            new ModerateActivityMinutes(),
            new VigorousActivityMinutes(),
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
