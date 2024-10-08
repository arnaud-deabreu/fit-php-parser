<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\BikeProfile\AutoPowerZero;
use FitParser\Messages\Profile\Generated\BikeProfile\AutoWheelCal;
use FitParser\Messages\Profile\Generated\BikeProfile\AutoWheelsize;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeCadAntId;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeCadAntIdTransType;
use FitParser\Messages\Profile\Generated\BikeProfile\BikePowerAntId;
use FitParser\Messages\Profile\Generated\BikeProfile\BikePowerAntIdTransType;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeSpdAntId;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeSpdAntIdTransType;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeSpdcadAntId;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeSpdcadAntIdTransType;
use FitParser\Messages\Profile\Generated\BikeProfile\BikeWeight;
use FitParser\Messages\Profile\Generated\BikeProfile\CadEnabled;
use FitParser\Messages\Profile\Generated\BikeProfile\CrankLength;
use FitParser\Messages\Profile\Generated\BikeProfile\CustomWheelsize;
use FitParser\Messages\Profile\Generated\BikeProfile\Enabled;
use FitParser\Messages\Profile\Generated\BikeProfile\FrontGear;
use FitParser\Messages\Profile\Generated\BikeProfile\FrontGearNum;
use FitParser\Messages\Profile\Generated\BikeProfile\Id;
use FitParser\Messages\Profile\Generated\BikeProfile\MessageIndex;
use FitParser\Messages\Profile\Generated\BikeProfile\Name;
use FitParser\Messages\Profile\Generated\BikeProfile\Odometer;
use FitParser\Messages\Profile\Generated\BikeProfile\OdometerRollover;
use FitParser\Messages\Profile\Generated\BikeProfile\PowerCalFactor;
use FitParser\Messages\Profile\Generated\BikeProfile\PowerEnabled;
use FitParser\Messages\Profile\Generated\BikeProfile\RearGear;
use FitParser\Messages\Profile\Generated\BikeProfile\RearGearNum;
use FitParser\Messages\Profile\Generated\BikeProfile\ShimanoDi2Enabled;
use FitParser\Messages\Profile\Generated\BikeProfile\SpdcadEnabled;
use FitParser\Messages\Profile\Generated\BikeProfile\SpdEnabled;
use FitParser\Messages\Profile\Generated\BikeProfile\Sport;
use FitParser\Messages\Profile\Generated\BikeProfile\SubSport;
use FitParser\Messages\Profile\MessageInterface;

final readonly class BikeProfile implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Name $name,
        public Sport $sport,
        public SubSport $subSport,
        public Odometer $odometer,
        public BikeSpdAntId $bikeSpdAntId,
        public BikeCadAntId $bikeCadAntId,
        public BikeSpdcadAntId $bikeSpdcadAntId,
        public BikePowerAntId $bikePowerAntId,
        public CustomWheelsize $customWheelsize,
        public AutoWheelsize $autoWheelsize,
        public BikeWeight $bikeWeight,
        public PowerCalFactor $powerCalFactor,
        public AutoWheelCal $autoWheelCal,
        public AutoPowerZero $autoPowerZero,
        public Id $id,
        public SpdEnabled $spdEnabled,
        public CadEnabled $cadEnabled,
        public SpdcadEnabled $spdcadEnabled,
        public PowerEnabled $powerEnabled,
        public CrankLength $crankLength,
        public Enabled $enabled,
        public BikeSpdAntIdTransType $bikeSpdAntIdTransType,
        public BikeCadAntIdTransType $bikeCadAntIdTransType,
        public BikeSpdcadAntIdTransType $bikeSpdcadAntIdTransType,
        public BikePowerAntIdTransType $bikePowerAntIdTransType,
        public OdometerRollover $odometerRollover,
        public FrontGearNum $frontGearNum,
        public FrontGear $frontGear,
        public RearGearNum $rearGearNum,
        public RearGear $rearGear,
        public ShimanoDi2Enabled $shimanoDi2Enabled,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Name(),
            new Sport(),
            new SubSport(),
            new Odometer(),
            new BikeSpdAntId(),
            new BikeCadAntId(),
            new BikeSpdcadAntId(),
            new BikePowerAntId(),
            new CustomWheelsize(),
            new AutoWheelsize(),
            new BikeWeight(),
            new PowerCalFactor(),
            new AutoWheelCal(),
            new AutoPowerZero(),
            new Id(),
            new SpdEnabled(),
            new CadEnabled(),
            new SpdcadEnabled(),
            new PowerEnabled(),
            new CrankLength(),
            new Enabled(),
            new BikeSpdAntIdTransType(),
            new BikeCadAntIdTransType(),
            new BikeSpdcadAntIdTransType(),
            new BikePowerAntIdTransType(),
            new OdometerRollover(),
            new FrontGearNum(),
            new FrontGear(),
            new RearGearNum(),
            new RearGear(),
            new ShimanoDi2Enabled(),
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
