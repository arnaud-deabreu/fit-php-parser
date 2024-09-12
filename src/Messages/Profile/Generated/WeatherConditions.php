<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\WeatherConditions\Condition;
use FitParser\Messages\Profile\Generated\WeatherConditions\DayOfWeek;
use FitParser\Messages\Profile\Generated\WeatherConditions\HighTemperature;
use FitParser\Messages\Profile\Generated\WeatherConditions\Location;
use FitParser\Messages\Profile\Generated\WeatherConditions\LowTemperature;
use FitParser\Messages\Profile\Generated\WeatherConditions\ObservedAtTime;
use FitParser\Messages\Profile\Generated\WeatherConditions\ObservedLocationLat;
use FitParser\Messages\Profile\Generated\WeatherConditions\ObservedLocationLong;
use FitParser\Messages\Profile\Generated\WeatherConditions\PrecipitationProbability;
use FitParser\Messages\Profile\Generated\WeatherConditions\RelativeHumidity;
use FitParser\Messages\Profile\Generated\WeatherConditions\Temperature;
use FitParser\Messages\Profile\Generated\WeatherConditions\TemperatureFeelsLike;
use FitParser\Messages\Profile\Generated\WeatherConditions\Timestamp;
use FitParser\Messages\Profile\Generated\WeatherConditions\WeatherReport;
use FitParser\Messages\Profile\Generated\WeatherConditions\WindDirection;
use FitParser\Messages\Profile\Generated\WeatherConditions\WindSpeed;
use FitParser\Messages\Profile\MessageInterface;

final readonly class WeatherConditions implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public WeatherReport $weatherReport,
        public Temperature $temperature,
        public Condition $condition,
        public WindDirection $windDirection,
        public WindSpeed $windSpeed,
        public PrecipitationProbability $precipitationProbability,
        public TemperatureFeelsLike $temperatureFeelsLike,
        public RelativeHumidity $relativeHumidity,
        public Location $location,
        public ObservedAtTime $observedAtTime,
        public ObservedLocationLat $observedLocationLat,
        public ObservedLocationLong $observedLocationLong,
        public DayOfWeek $dayOfWeek,
        public HighTemperature $highTemperature,
        public LowTemperature $lowTemperature,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new WeatherReport(),
            new Temperature(),
            new Condition(),
            new WindDirection(),
            new WindSpeed(),
            new PrecipitationProbability(),
            new TemperatureFeelsLike(),
            new RelativeHumidity(),
            new Location(),
            new ObservedAtTime(),
            new ObservedLocationLat(),
            new ObservedLocationLong(),
            new DayOfWeek(),
            new HighTemperature(),
            new LowTemperature(),
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