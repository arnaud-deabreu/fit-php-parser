<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\DiveSettings\ApneaCountdownEnabled;
use FitParser\Messages\Profile\Generated\DiveSettings\ApneaCountdownTime;
use FitParser\Messages\Profile\Generated\DiveSettings\BacklightBrightness;
use FitParser\Messages\Profile\Generated\DiveSettings\BacklightMode;
use FitParser\Messages\Profile\Generated\DiveSettings\BacklightTimeout;
use FitParser\Messages\Profile\Generated\DiveSettings\BottomDepth;
use FitParser\Messages\Profile\Generated\DiveSettings\BottomTime;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrHighSetpoint;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrHighSetpointDepth;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrHighSetpointSwitchMode;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrLowSetpoint;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrLowSetpointDepth;
use FitParser\Messages\Profile\Generated\DiveSettings\CcrLowSetpointSwitchMode;
use FitParser\Messages\Profile\Generated\DiveSettings\DiveSounds;
use FitParser\Messages\Profile\Generated\DiveSettings\GasConsumptionDisplay;
use FitParser\Messages\Profile\Generated\DiveSettings\GfHigh;
use FitParser\Messages\Profile\Generated\DiveSettings\GfLow;
use FitParser\Messages\Profile\Generated\DiveSettings\HeartRateSource;
use FitParser\Messages\Profile\Generated\DiveSettings\HeartRateSourceType;
use FitParser\Messages\Profile\Generated\DiveSettings\LastStopMultiple;
use FitParser\Messages\Profile\Generated\DiveSettings\Model;
use FitParser\Messages\Profile\Generated\DiveSettings\Name;
use FitParser\Messages\Profile\Generated\DiveSettings\NoFlyTimeMode;
use FitParser\Messages\Profile\Generated\DiveSettings\Po2Critical;
use FitParser\Messages\Profile\Generated\DiveSettings\Po2Deco;
use FitParser\Messages\Profile\Generated\DiveSettings\Po2Warn;
use FitParser\Messages\Profile\Generated\DiveSettings\RepeatDiveInterval;
use FitParser\Messages\Profile\Generated\DiveSettings\SafetyStopEnabled;
use FitParser\Messages\Profile\Generated\DiveSettings\SafetyStopTime;
use FitParser\Messages\Profile\Generated\DiveSettings\TravelGas;
use FitParser\Messages\Profile\Generated\DiveSettings\UpKeyEnabled;
use FitParser\Messages\Profile\Generated\DiveSettings\WaterDensity;
use FitParser\Messages\Profile\Generated\DiveSettings\WaterType;
use FitParser\Messages\Profile\MessageInterface;

final readonly class DiveSettings implements MessageInterface
{
    private function __construct(
        public Name $name,
        public Model $model,
        public GfLow $gfLow,
        public GfHigh $gfHigh,
        public WaterType $waterType,
        public WaterDensity $waterDensity,
        public Po2Warn $po2Warn,
        public Po2Critical $po2Critical,
        public Po2Deco $po2Deco,
        public SafetyStopEnabled $safetyStopEnabled,
        public BottomDepth $bottomDepth,
        public BottomTime $bottomTime,
        public ApneaCountdownEnabled $apneaCountdownEnabled,
        public ApneaCountdownTime $apneaCountdownTime,
        public BacklightMode $backlightMode,
        public BacklightBrightness $backlightBrightness,
        public BacklightTimeout $backlightTimeout,
        public RepeatDiveInterval $repeatDiveInterval,
        public SafetyStopTime $safetyStopTime,
        public HeartRateSourceType $heartRateSourceType,
        public HeartRateSource $heartRateSource,
        public TravelGas $travelGas,
        public CcrLowSetpointSwitchMode $ccrLowSetpointSwitchMode,
        public CcrLowSetpoint $ccrLowSetpoint,
        public CcrLowSetpointDepth $ccrLowSetpointDepth,
        public CcrHighSetpointSwitchMode $ccrHighSetpointSwitchMode,
        public CcrHighSetpoint $ccrHighSetpoint,
        public CcrHighSetpointDepth $ccrHighSetpointDepth,
        public GasConsumptionDisplay $gasConsumptionDisplay,
        public UpKeyEnabled $upKeyEnabled,
        public DiveSounds $diveSounds,
        public LastStopMultiple $lastStopMultiple,
        public NoFlyTimeMode $noFlyTimeMode,
    ) {}

    public static function create(): self
    {
        return new self(
            new Name(),
            new Model(),
            new GfLow(),
            new GfHigh(),
            new WaterType(),
            new WaterDensity(),
            new Po2Warn(),
            new Po2Critical(),
            new Po2Deco(),
            new SafetyStopEnabled(),
            new BottomDepth(),
            new BottomTime(),
            new ApneaCountdownEnabled(),
            new ApneaCountdownTime(),
            new BacklightMode(),
            new BacklightBrightness(),
            new BacklightTimeout(),
            new RepeatDiveInterval(),
            new SafetyStopTime(),
            new HeartRateSourceType(),
            new HeartRateSource(),
            new TravelGas(),
            new CcrLowSetpointSwitchMode(),
            new CcrLowSetpoint(),
            new CcrLowSetpointDepth(),
            new CcrHighSetpointSwitchMode(),
            new CcrHighSetpoint(),
            new CcrHighSetpointDepth(),
            new GasConsumptionDisplay(),
            new UpKeyEnabled(),
            new DiveSounds(),
            new LastStopMultiple(),
            new NoFlyTimeMode(),
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
